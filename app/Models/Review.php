<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    const REVIEW_STATUSES = [
        0 => 'На модерации',
        1 => 'Отклонен',
        2 => 'Активен',
    ];

    const ACTIVE_REVIEW = 2;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reviews';

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
    protected $fillable = ['message', 'vote', 'user_id', 'page_id', 'locale_id', 'is_active', 'created_at', 'updated_at'];

    public function getPage()
    {
        return $this->hasOne(Page::class, 'id', 'page_id');
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function reviewStatus()
    {
        return self::REVIEW_STATUSES[$this->is_active];
    }
}
