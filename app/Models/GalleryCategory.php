<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryCategory extends Model
{

    use HasFactory;

    const ACTIVE = 1;
    const NOT_ACTIVE = 0;

    const STATUS_MAP = [
        self::ACTIVE => 'Активен',
        self::NOT_ACTIVE => 'Отключен',
    ];
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gallery_categories';

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
    protected $fillable = ['name', 'parent_id', 'is_active'];

    public function status()
    {
        return self::STATUS_MAP[$this->is_active];
    }

    public function children()
    {
        return $this->hasMany(GalleryCategory::class, 'parent_id', 'id');
    }

    public function images()
    {
        return $this->belongsToMany(Gallery::class, 'gallery_gallery_category', 'gallery_category_id', 'gallery_id');   
    }
}
