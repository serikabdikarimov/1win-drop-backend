<?php

namespace App\Services;

use App\Models\Lang;
use Illuminate\Support\Facades\DB;

class UpdateYearsService
{
    public function update()
    {
        $langs = Lang::pluck('code');
        $input = "2023";
        $output = '2024';

        $builder = DB::table('translates');

        foreach ($langs as $lang) {
            $builder->orWhere($lang, 'LIKE', "%$input%");
        }

        $result = $builder->get();
        foreach ($result as $key => $value) {
            foreach ($langs as $lang) {
                $value->$lang = str_replace($input, $output, $value->$lang);
            }
        }

        return $result;
    }
}