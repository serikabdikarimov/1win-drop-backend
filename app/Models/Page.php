<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Author;
use Illuminate\Support\Str;

class Page extends Model
{
    const DEFAULT_PAGE = 1;
    const BRAND_PAGE = 2;
    const AUTHOR_PAGE = 3;
    const ARTICLE_PAGE = 4;

    const PAGE_TYPES = [
        1 => 'Обычная страница',
        2 => 'Бренд',
        3 => 'Страница автора',
        4 => 'Статья',
        //5 => 'Платежный метод',
    ];

    const ACTIVE = 2;
    const SOON = 1;
    const NO_ACTIVE = 0;
    
    const PAGE_STATUSES = [
        2 => 'Опубликовано',
        1 => 'Скоро',
        0 => 'Нет',
    ];

    const SCHEMA_TYPES = [
        'faqs'
    ];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'title', 'banner', 'content', 'add_content', 'brand_id', 'slug', 'meta_title', 'meta_description', 'meta_keywords', 'type', 'type_content_id', 'status', 'autor_id', 'custom_schema', 'locale_id', 'showcase'];

    public function getBrand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function getBanner()
    {
        return $this->hasOne(Gallery::class, 'id', 'banner');
    }

    public function showcase() {
        return $this->belongsToMany(Brand::class)->withPivot('position');
    }

    public function pageType()
    {
        return self::PAGE_TYPES[$this->type];
    }

    public function getBrandInWiew($item, $domainName)
    {
        $domain = Localization::where('locale_name', $domainName)->first();
        
        return Brand::where(['slug' => $item, 'locale_id' => $domain->id])->first();
    }

    public function getSchema($domainId, $pageId, $type)
    {
        return Schema::where(['page_id' => $pageId, 'locale_id' => $domainId, 'schema_type' => $type])->first();
    }

    public static function getMenuCategory($code)
    {
        $domainName = request()->getHost();
        $domain = Localization::where('locale_name', $domainName)->first();
        
        return MenuCategory::where(['code' => $code, 'locale_id' => $domain->id])->first();
    }

    public static function getSlider($pageId)
    {        
        return Slider::where(['page_id' => $pageId, 'status' => 1])->first();
    }

    public function currentMenu($id)
    {
        $domainName = request()->getHost();
        $domain = Localization::where('locale_name', $domainName)->first();

        return MenuItem::where(['page_id' => $id, 'locale_id' => $domain->id])->first();
    }

    public function getSocals()
    {
        $domainName = request()->getHost();
        $domain = Localization::where('locale_name', $domainName)->first();

        return Social::where('locale_id', $domain->id)->get();
    }

    public function author()
    {
        return $this->hasOne(Autor::class, 'id', 'autor_id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'type_content_id');
    }

    public function headerLinks($pageId,  $langId)
    {
        $three = null;

        $links = HeadingLinks::where(['locale_id' => $langId, 'page_id' => $pageId])->first();
        if ($links) {
            $three = '<ol>';
            
            foreach (json_decode($links->data) as $value) {
                $three .= $this->three('', $value);
            }
            
            // $faqs = Faq::where(['locale_id' => $langId, 'page_id' => $pageId])->get();
            
            // if ($faqs->count() > 0) {
            //     $three .='<li><a href="#faqs" rel="noindex nofollow">'. __('messages.faqs') . '</a>';
            //     $three .='<ol>';
                
            //     foreach ($faqs as $item) {
            //         $three .='<li><a href="#' . Str::slug($item->question) . '">' . $item->question . '</a></li>';
            //     }

            //     $three .='</ol>';
            // }

            $three .= '</ol>';
        }
        
        
        return $three;
    }

    private function three($three, $value)
    {
        //dd($value);
        if ($value !=null) {
            foreach ($value as $item) {
                $three .= '<li><a href="#' . $item->link . '">' . $item->title .'</a>';
                
                if (isset($item->subItems)) {
                    $three .= '<ol>';
                    $three .= $this->three('', $item->subItems);
                    $three .= '</ol>';
                }
    
                $three .= '</li>';
            }
        }
        

        return $three;
    }

    public function getAttributItemsByAttr($attributeUid)
    {
        $lang = Localization::orderBy('id', 'ASC')->first();
        $langLink = session('admin_locale') != null ? session('admin_locale') : $lang->code;
        $currentLang = Localization::where('code', $langLink)->first();

        $items = AttributeItem::where(['locale_id' => $currentLang->id, 'attribute_uid' => $attributeUid])->pluck('name','slug');

        return $items;
    }

    public function getAttributeToFront($attributeUid)
    {
        $lang = Localization::where('locale_name',request()->getHost())->first();
        $items = Attribute::where(['locale_id' => $lang->id, 'slug' => $attributeUid])->select('title','icon')->first();

        return $items;
    }

    public function getAttributItemByAttrToFront($slug)
    {
        $lang = Localization::where('locale_name',request()->getHost())->first();
        $items = AttributeItem::where(['locale_id' => $lang->id, 'slug' => $slug])->select('title')->first();

        return $items;
    }

    public static function getAuthor($authorId)
    {
        $lang = Localization::where('locale_name',request()->getHost())->first();

        $author = Autor::where(['locale_id' => $lang->id, 'id' => $authorId])->first();
        
        return $author;
    }

    public static function getReviews($pageId)
    {
        $lang = Localization::where('locale_name',request()->getHost())->first();
        
        $reviews = Review::where(['locale_id' => $lang->id, 'page_id' => $pageId, 'is_active' => 2])->get();
        
        return $reviews;
    }
}
