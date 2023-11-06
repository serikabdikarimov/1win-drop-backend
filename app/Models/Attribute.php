<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attributes';

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
    protected $fillable = ['name', 'title', 'locale_id', 'slug', 'icon'];

    public static function getTitle($slug, $domainId) 
    {
        $data = Attribute::where(['slug' => $slug, 'locale_id' => $domainId])->first();
        
        return $data;
    }

    public static function getItem($slug, $domainId)
    {
        $data = AttributeItem::where('slug', $slug)->where('locale_id', $domainId)->first();

        return $data;
    }

    public static function getIcon($slug, $langId)
    {
        $attribute = Attribute::where(['slug' => $slug, 'locale_id' => $langId])->first();
        
        return Gallery::where('id', $attribute->icon)->first();
    }
}
