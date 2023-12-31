<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'link',
        'locale_id',
        'logo'
    ];

    public function getLogo()
    {
        return $this->hasOne(Gallery::class, 'id', 'logo');
    }
}
