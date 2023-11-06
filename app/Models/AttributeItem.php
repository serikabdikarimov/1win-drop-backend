<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeItem extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attribute_items';

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
    protected $fillable = ['name', 'title', 'attribute_uid', 'icon', 'locale_id', 'slug'];

    public static function getTitle($slug, $domainId)
    {
        $attribute = AttributeItem::where(['slug' => $slug, 'locale_id' => $domainId])->first();
        
        return $attribute;
    }

    public function getParent()
    {
        return $this->hasOne(Attribute::class, 'id', 'attribute_id');
    }

    public static function getIcon($slug, $domainId)
    {
        $attribute = AttributeItem::where(['slug' => $slug, 'locale_id' => $domainId])->first();

        return Gallery::where('id', $attribute->icon)->first();
    }
}
