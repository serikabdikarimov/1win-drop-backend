<?php

namespace App\Services;

use App\Models\Lang;
use App\Models\Translate;

class TranslateService
{
    public static function addTranslate($data) 
    {
        $model = new Translate();
        foreach($data as $key => $item) {
            if (is_array($item)) {
                $item = json_encode($item);
            }
            $model->$key = $item;
        }

        $model->save();

        return $model->id;
    }

    public static function updateTranslate($id, $data) 
    {
        $model = Translate::findOrFail($id);

        foreach($data as $key => $item) {
            $model->$key = $item;
        }

        $model->update();

        return $model->id;
    }

    public static function addSoloTranslate($data)
    {
        $langs = Lang::pluck('code');
        $model = new Translate();

        foreach($langs as $lang) {
            $model->$lang = $data;
        }

        $model->save();
        
        return $model->id;
    }

    public static function updateSoloTranslate($id, $data)
    {
        $langs = Lang::pluck('code');
        $model = Translate::findOrFail($id);

        foreach($langs as $lang) {
            $model->$lang = $data;
        }

        $model->update();
        
        return $model->id;
    }
}