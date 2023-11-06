<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Brand extends Model
{

    const ACTIVE = 1;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'brands';

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
    protected $fillable = ['name', 'subtitle', 'short_description', 'text_after_button', 'description', 'url', 'logo', 'custom_logo', 'promocode', 'promocode_text', 'is_active', 'sidebar', 'showcase', 'rating', 'locale_id', 'slug'];

    public function getLogo()
    {
        return $this->hasOne(Gallery::class, 'id', 'logo');
    }

    public function getCustomLogo()
    {
        return $this->hasOne(Gallery::class, 'id', 'custom_logo');
    }

    public function checkAttr($slug, $domainId)
    {
        return Attribute::where(['slug' => $slug, 'locale_id' => $domainId])->first();
    }

    public function recomendedBrands()
    {
        return $this->belongsToMany(Brand::class, 'recomended_brands', 'brand_id', 'recomended_brand_id')->withPivot('position');
    }
    
    public function attributeItems($slug)
    {
        return AttributeItem::where('attribute_uid', $slug)->select('name', 'slug')->groupBy(['name', 'slug'])->get();
    }

    // Средний рейтинг
    public function rating()
    {   
        $ratingSumm = 0;

        if($this->rating != null) {
            $items = json_decode($this->rating);
            $count = count((array) $items);
            
            foreach (json_decode($this->rating) as $index=>$rating) {
                if (!is_array($rating->attribute_item_id)) {
                    $ratingSumm = $ratingSumm + $rating->attribute_item_id; 
                }
            }

            $rating = $ratingSumm / $count; //среднее значение
        } 
            
        return $rating;
    }

    public function attributeWeb($attributeItems, $domainName)
    {
        $domain = Localization::where('locale_name', $domainName)->first();

        if($this->checkAttr($attributeItems->attribute_id, $domain->id)) {
                    
            $attr = Attribute::where(['slug' => $attributeItems->attribute_id, 'locale_id' => $domain->id])->first();
            $attrItem = AttributeItem::where(['slug' => $attributeItems->attribute_item_id[0], 'locale_id' => $domain->id])->first();

            $result['attr'] = $attr->title;
            $result['item'] = $attrItem->title;
            
        } else {
            $result['attr'] = $attributeItems->attribute_id;  
            $result['item'] = $attributeItems->attribute_item_id;
        }

        return $result;
    }

    public static function page($id) 
    {
        $domain = Localization::where('locale_name', request()->getHost())->first();
        $page = Page::where(['locale_id' => $domain->id, 'type' => 2, 'type_content_id' => $id])->first();

        return $page;
    }

    public function reviews() 
    {
        return $this->hasMany(Review::class, 'brand_id', 'id')->where('is_active', Review::ACTIVE_REVIEW)->orderBy('created_at', 'DESC');
    }

    public static function userFavorite($brandId)
    {
        $userId = Auth::user()->id;
        
        return UserFavorite::where(['user_id' => $userId, 'brand_id' => $brandId])->first();    
    }
}
