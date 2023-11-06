<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    const POST_STATUSES = [
        2 => 'Опубликовано',
        1 => 'Скоро',
        0 => 'Нет',
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

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
    protected $fillable = ['title', 'short_description', 'content', 'image', 'autor_id', 'status', 'meta_title', 'meta_description', 'meta_keywords'];

    public function getTitle()
    {
        return $this->hasOne(Translate::class, 'id', 'title');
    }

    public function getShortDescription()
    {
        return $this->hasOne(Translate::class, 'id', 'short_description');
    }

    public function getContent()
    {
        return $this->hasOne(Translate::class, 'id', 'content');
    }

    public function getImage()
    {
        return $this->hasOne(Gallery::class, 'id', 'image');
    }

    public function getAutor()
    {
        return $this->hasOne(Autor::class, 'id', 'autor_id');
    }

    public function getMetaTitle()
    {
        return $this->hasOne(Translate::class, 'id', 'meta_title');
    }

    public function getMetaDescription()
    {
        return $this->hasOne(Translate::class, 'id', 'meta_description');
    }

    public function getMetaKeywords()
    {
        return $this->hasOne(Translate::class, 'id', 'meta_keywords');
    }

    public function getStatus()
    {
        return $this->hasOne(Translate::class, 'id', 'status');
    }
}
