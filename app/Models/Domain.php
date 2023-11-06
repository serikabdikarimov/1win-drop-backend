<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    const ACTIVE = 1;
    const NOT_ACTIVE = 0;

    const STATUS_MAP = [
        self::ACTIVE => 'Активен',
        self::NOT_ACTIVE => 'Отключен',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'locale_name',
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
        $domain = Domain::orderBy('id', 'ASC')->first();

        return $domain->id;
    }

    public static function defaultDomainCode()
    {
        $domain = Domain::orderBy('id', 'ASC')->first();

        return $domain->code;
    }

    public function getIcon()
    {
        return $this->hasOne(Gallery::class, 'id', 'icon');
    }

    public static function getSocials($id)
    {
        return Social::where('locale_id', $id)->first();
    }

    public function getSocalsFront()
    {
        $domainName = request()->getHost();
        $domain = Domain::where('domain_name', $domainName)->first();

        return Social::where('locale_id', $domain->id)->get();
    }

    public static function getMenuCategory($code)
    {
        $domainName = request()->getHost();
        $domain = Domain::where('domain_name', $domainName)->first();
        if (!$domain) {
            $domain = Domain::first(); 
        }
        return MenuCategory::where(['code' => $code, 'locale_id' => $domain->id])->first();
    }
    public static function path($domainId, $slug)
    {
        $path = Page::where(['status' => 2,'locale_id' => $domainId, 'slug' => $slug])->first();
        
        return $path;
    }
}
