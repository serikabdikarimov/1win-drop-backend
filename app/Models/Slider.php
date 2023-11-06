<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sliders';

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
    protected $fillable = ['title', 'subtitle', 'image', 'page_id', 'status', 'locale_id'];

    public function getPage()
    {
        return $this->hasOne(Page::class, 'id', 'page_id');
    }

    public function getImage()
    {
        return $this->hasOne(Gallery::class, 'id', 'image');
    }

    public function getStatus()
    {
        return $this->hasOne(Translate::class, 'id', 'status');
    }
}
