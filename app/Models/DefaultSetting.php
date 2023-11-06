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
    protected $fillable = ['site_name', 'address', 'logo', 'phone', 'locale_id', 'email', 'meta_title', 'meta_description', 'meta_keywords', 'google_client_id', 'google_client_secret', 'twitter_client_id', 'twitter_client_secret', 'twitter_api_key', 'facebook_client_id', 'facebook_client_secret', 'apple_client_id', 'apple_client_secret', 'apple_key_id', 'apple_team_id', 'apple_auth_key', 'apple_client_secret_updated_at', 'apple_refresh_token_interval_days'];

    public function getLogo()
    {
        return $this->hasOne(Gallery::class, 'id', 'logo');
    }
}
