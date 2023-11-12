<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'galleries';

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
    protected $fillable = ['title', 'url', 'alt', 'locale_id', 'attr_title', 'width', 'height'];

    public function categories()
    {
        return $this->belongsToMany(GalleryCategory::class);
    }

    public function getAlt($url, $locale_id)
    {
        $data = Gallery::where(['url' => $url, 'locale_id' => $locale_id])->first();

        return $data;
    }

    public function getTitle($url, $locale_id)
    {
        $data = Gallery::where(['url' => $url, 'locale_id' => $locale_id])->first();

        return $data;
    }


}
