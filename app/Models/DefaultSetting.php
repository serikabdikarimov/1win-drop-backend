<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DefaultSetting extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'default_settings';

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
    protected $fillable = [
        'site_name',
        'address',
        'logo',
        'phone',
        'locale_id',
        'email',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'google_client_id',
        'google_client_secret',
        'twitter_client_id',
        'twitter_client_secret',
        'twitter_api_key',
        'facebook_client_id',
        'facebook_client_secret',
        'apple_client_id',
        'apple_client_secret',
        'apple_key_id',
        'apple_team_id',
        'apple_auth_key',
        'apple_client_secret_updated_at',
        'apple_refresh_token_interval_days',
        'manifest_512',
        'manifest_192',
        'manifest_theme_color',
        'manifest_background_color',
        'manifest_short_description',
        'manifest_description',
        'manifest_name',
        'favicon_32',
        'favicon_64',
        'favicon_180'
    ];

    public function getLogo()
    {
        return $this->hasOne(Gallery::class, 'id', 'logo');
    }

    public function getFavicon32(){
        return $this->hasOne(Gallery::class, 'id', 'favicon_32');
    }

    public function getFavicon64(){
        return $this->hasOne(Gallery::class, 'id', 'favicon_64');
    }

    public function getFavicon180(){
        return $this->hasOne(Gallery::class, 'id', 'favicon_180');
    }

    public function getManifestIcon192()
    {
        return $this->hasOne(Gallery::class, 'id', 'manifest_192');
    }

    public function getManifestIcon512()
    {
        return $this->hasOne(Gallery::class, 'id', 'manifest_512');
    }
}
