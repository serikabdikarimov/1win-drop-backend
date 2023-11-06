<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menu_items';

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
    protected $fillable = ['name', 'url', 'code', 'is_active', 'parent_id', 'page_id', 'position', 'icon', 'locale_id', 'position'];

    public function categories() {
        return $this->belongsToMany(MenuCategory::class);
    }

    public function getName() {
        return $this->hasOne(Translate::class, 'id', 'name');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

    public function getStatus()
    {
        return $this->hasOne(Translate::class, 'id', 'is_active');
    }

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id', 'id');
    }
}
