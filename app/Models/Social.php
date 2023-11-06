<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'socials';

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
    protected $fillable = ['twitter', 'facebook', 'telegram', 'youtube', 'instagram', 'locale_id'];

    public function getIcon()
    {
        return $this->hasOne(Gallery::class, 'id', 'icon');
    }
}
