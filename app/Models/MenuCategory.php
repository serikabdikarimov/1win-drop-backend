<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuCategory extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menu_categories';

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
    protected $fillable = ['name', 'code', 'icon', 'image', 'locale_id', 'is_active', 'description'];

    public function items() {
        $localeName = request()->getHost();
        $localization = Localization::where('locale_name', $localeName)->first();

        if (!$localization) {
            $localization = Localization::first();
        }

        return $this->belongsToMany(MenuItem::class)->whereNull('parent_id')->where('locale_id', $localization->id)->orderBy('position', 'ASC');
    }

    public function getImage()
    {
        return $this->hasOne(Gallery::class, 'id', 'image');
    }
}
