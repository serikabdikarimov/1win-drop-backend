<?php

use App\Models\Dictionary;
use App\Models\Localization;

$localization = Localization::where('locale_name', request()->getHost())->first();

if (!$localization) {
    $localization = Localization::first(); 
}

return Dictionary::where('locale_id', $localization->id)->get()->pluck('translate', 'code')->toArray();