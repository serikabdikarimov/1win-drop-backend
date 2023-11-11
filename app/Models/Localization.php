<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    use HasFactory;

    const ACTIVE = 1;
    const NOT_ACTIVE = 0;

    const STATUS_MAP = [
        self::ACTIVE => 'Активен',
        self::NOT_ACTIVE => 'Отключен',
    ];

    protected $table = 'localization';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'region_name',
        'locale_name',
        'group_id',
        'code',
        'icon',
        'is_active'
    ];

    public function status()
    {
        return self::STATUS_MAP[$this->is_active];
    }

    public static function defaultDomain()
    {
        $localization = Localization::orderBy('id', 'ASC')->first();

        return $localization->id;
    }

    public static function defaultDomainCode()
    {
        $localization = Localization::orderBy('id', 'ASC')->first();

        return $localization->code;
    }

    public static function getSocials($id)
    {
        return Social::where('locale_id', $id)->first();
    }

    public function getSocalsFront()
    {
        $localeName = request()->getHost();
        $localization = Localization::where('locale_name', $localeName)->first();

        return Social::where('locale', $localization->id)->get();
    }

    public static function getMenuCategory($code)
    {
        $localeName = request()->getHost();
        $localization = Localization::where('locale_name', $localeName)->first();
        if (!$localization) {
            $localization = Localization::first();
        }
        return MenuCategory::where(['code' => $code, 'locale_id' => $localization->id])->first();
    }
    public static function path($localeId, $slug)
    {
        $path = Page::where(['status' => 2,'locale_id' => $localeId, 'slug' => $slug])->first();

        return $path;
    }
    public function getSettings(){
        return $this->hasOne(DefaultSetting::class, 'locale_id', 'id');
    }
}
