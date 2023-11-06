<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'autors';

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
    protected $fillable = ['name', 'image', 'post', 'bio', 'fb', 'twitter', 'linkedin', 'locale_id', 'slug'];

    public function getName()
    {
        return $this->hasOne(Translate::class, 'id', 'name');
    }

    public function getPost()
    {
        return $this->hasOne(Translate::class, 'id', 'post');
    }

    public function getBio()
    {
        return $this->hasOne(Translate::class, 'id', 'bio');
    }

    public function getImage()
    {
        return $this->hasOne(Gallery::class, 'id', 'image');
    }

    public function getAuthorPages()
    {
        $domain = Localization::where('locale_name', request()->getHost())->first();
        return $this->hasMany(Page::class, 'autor_id', 'id')->where('locale_id', $domain->id)->orderBy('updated_at', 'DESC');
    }

    public static function page($id)
    {
        $domain = Localization::where('locale_name', request()->getHost())->first();

        return Page::where(['type' => 3, 'type_content_id' => $id, 'locale_id' => $domain->id])->first();
    }
}
