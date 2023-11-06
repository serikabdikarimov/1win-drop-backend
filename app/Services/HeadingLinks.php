<?php
namespace App\Services;

use App\Models\HeadingLinks as ModelsHeadingLinks;
use Illuminate\Support\Str;

class HeadingLinks
{
    public $symbols = "/\!|\?|:|\.|\,|\;|\\|\/|{|}|\[|\]|\(|\)|\%|\^|\*|_|\=|\+|\@|\#|\~|`|\'|\"|“/";
    public $spaces = "/ |\&nbsp\;|\\r|\\n/";
    public $stripTags = "/<\/?[^>]+>|\&[a-z]+;|\'|\"/";

    public function createMenu($data, $langId, $pageId)
    {
        foreach ($data as $index=>$blocks) {
            
            $key = key($blocks);
            
            if ($key == 'block') {
                $text =(array) $blocks;

                if (isset($blocks['block']['title']) && $blocks['block']['title'] != null) {
                    $menu[] = json_decode('{"0": {"title" : "' . $blocks['block']['title'] . '", "link" : "' . Str::slug($blocks['block']['title']) . '"}}');
                }

                $str = $text['block']['content'];
                $tableContents = $this->tableContents($str);
                
                $data[$index]['block']['content'] = $this->headerLinks($str); //редактирование контента

                $menu[] = json_decode($tableContents);
            } 
            
            if ($key == 'plus_minus' && isset($blocks['plus_minus']['title']) && $blocks['plus_minus']['title'] != null) {
                $menu[] = json_decode('{"0": {"title" : "' . $blocks['plus_minus']['title'] . '", "link" : "' . Str::slug($blocks['plus_minus']['title']) . '"}}');
            } 
            
            if ($key == 'static_attributes' && isset($blocks['static_attributes']['title']) && $blocks['static_attributes']['title'] != null) {
                $menu[] = json_decode('{"0": {"title" : "' . $blocks['static_attributes']['title'] . '", "link" : "' . Str::slug($blocks['static_attributes']['title']) . '"}}');
            }

            if ($key == 'dynamic_attributes' && isset($blocks['dynamic_attributes']['title']) && $blocks['dynamic_attributes']['title'] != null) {
                $menu[] = json_decode('{"0": {"title" : "' . $blocks['dynamic_attributes']['title'] . '", "link" : "' . Str::slug($blocks['dynamic_attributes']['title']) . '"}}');
            }
            
            if ($key == 'faqs' && isset($blocks['faqs']['faqs_title']) && $blocks['faqs']['faqs_title'] != null) {
                $menu[] = json_decode('{"0": {"title" : "' . $blocks['faqs']['faqs_title'] . '", "link" : "' . Str::slug($blocks['faqs']['faqs_title']) . '"}}');
            }
        }

        ModelsHeadingLinks::updateOrCreate([
            'locale_id' => $langId, 'page_id' => $pageId
        ],[
            'locale_id' => $langId, 
            'page_id' => $pageId,
            'data' => isset($menu) ? json_encode($menu, JSON_UNESCAPED_UNICODE) : null
        ]);

        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    
    //Добавляем id к заголовкам
    public function headerLinks(string $description) : string
    {
        $description = preg_replace("/<(p|[hH](3|[1-2]))>(<[hH](3|[1-2]).*?>(.*?)<\/[hH](3|[1-2])>)<\/(p|[hH](3|[1-2]))>/", "$3", $description);

        preg_match_all("/<[hH](3|[1-2]).*?>(.*?)<\/[hH](3|[1-2])>/", $description, $items);

        $usedItem = [];

        for ($i = 0; $i < count($items[0]); $i++) {

            //$name = preg_replace($this->stripTags, '', trim($this->replaceH1Symbols($items[2][$i])));
            
            $name = $items[2][$i];

            if ($name) {
                // $link = preg_replace($this->symbols, '', strtolower($name));
                // $link = preg_replace($this->spaces, '-', $link);
                $link = Str::slug($name);
                //$repeatCount = count(array_keys($usedItem, $name));

                // if ($repeatCount > 0) {
                //     $link .= '-' . ($repeatCount + 1);
                // }

                $title = "<h" . $items[1][$i] . " id='" . $link . "'>" . $items[2][$i] . "</h" . $items[1][$i] . ">";

                $description = $this->replaceFirstOccurrence($items[0][$i], $title, $description);

                $usedItem[] = $name;
            } else {
                $description = $this->replaceFirstOccurrence($items[0][$i], '', $description);
            }
        }

        return $description;
    }

    //Собираем меню для текстового блока
    public function tableContents(string $originText) : string
    {
        $originText = preg_replace("/<(p|[hH](3|[1-2]))>(<[hH](3|[1-2]).*?>(.*?)<\/[hH](3|[1-2])>)<\/(p|[hH](3|[1-2]))>/", "$3", $originText);

        preg_match_all("/<[hH](3|[1-2]).*?>(.*?)<\/[hH](3|[1-2])>/", $originText, $items);

        $menu = "{";
        $subItemsCount = 0;
        $parentItem = [];
        $usedItem = [];

        for ($i = 0; $i < count($items[0]); $i++) {

            //$name = preg_replace($this->stripTags, "", trim(html_entity_decode($this->replaceH1Symbols($items[2][$i]), ENT_QUOTES)));
            $name = $items[2][$i];
            if ($name) {
                $link = Str::slug($name);
                // $repeatCount = count(array_keys($usedItem, $name));

                // if ($repeatCount > 0) {
                //     $link .= "-" . ($repeatCount + 1);
                // }

                if ($i == 0) {
                    $menu .= '"' . $i . '": {';
                    $menu .= '"title": "' . $name . '",';
                    $menu .= '"link": "' . $link . '"';
                } elseif ($i != 0 && $items[1][$i] > $items[1][$i - 1]) {

                    $quantity = $items[1][$i] - $items[1][$i - 1];
                    $menu .= ', "subItems": {';
                    array_push($parentItem, (int)$items[1][$i - 1]);
                    $subItemsCount += $quantity;

                    for ($j = 1; $j <= $quantity - 1; $j++) {
                        $menu .= "\"" . $j . "\":{";
                        $menu .= '"subItems": {';
                        array_push($parentItem, $items[1][$i - 1] + $j);
                    }

                    $menu .= '"' . $i . '": {';
                    $menu .= '"title": "' . $name . '",';
                    $menu .= '"link": "' . $link . '"';

                } elseif ($i != 0 && $items[1][$i] < $items[1][$i - 1]) {
                    $quantity = $items[1][$i - 1] - $items[1][$i];
                    $menu .= "}";

                    if ($subItemsCount) {
                        for ($j = 1; $j <= $quantity * 2; $j++) {
                            $menu .= "}";
                            if ($j % 2 == 0) {
                                $subItemsCount--;
                                array_pop($parentItem);
                            }
                        }
                    }

                    $menu .= ', "' . $i . '": {';
                    $menu .= '"title": "' . $name . '",';
                    $menu .= '"link": "' . $link . '"';
                } else {
                    $menu .= '}, "' . $i . '": {';
                    $menu .= '"title": "' . $name . '",';
                    $menu .= '"link": "' . $link . '"';
                }

                if (!array_key_exists($i + 1, $items[1])) {
                    $a = $items[1][$i];

                    $lastParent = array_shift($parentItem);

                    if ($lastParent && $lastParent < $a) {
                        for ($q = 0; $q <= ($a - $lastParent) * 2; $q++) {
                            $menu .= "}";
                        }
                    } else {
                        $menu .= "}";
                    }
                }

                $usedItem[] = $name;
            }
        }
        $menu .= "}";

        return $menu;
    }

    /**
     * Replace special symbols in the headers
     *
     * @param string $text
     *
     * @return string
     */
    protected function replaceH1Symbols(string $text) : string
    {
        $text = preg_replace("/\&nbsp\;/", " ", $text);
        $text = preg_replace("/\&lt\;/", "«", $text);
        $text = preg_replace("/\&gt\;/", "»", $text);
        $text = preg_replace("/\&laquo\;/", "«", $text);
        $text = preg_replace("/\&raquo\;/", "»", $text);

        return $text;
    }

    /**
     * Replace first occurrence
     *
     * @param $from
     * @param $to
     * @param $subject
     *
     * @return string
     *
     * @link http://stackoverflow.com/questions/1252693/using-str-replace-so-that-it-only-acts-on-the-first-match
     */
    protected function replaceFirstOccurrence(string $from, string $to, string $subject) : string
    {
        $from = '/' . preg_quote($from, '/') . '/';

        return preg_replace($from, $to, $subject, 1);
    }
}