<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    const COMMENT_STATUSES = [
        0 => 'На модерации',
        1 => 'Отклонен',
        2 => 'Активен',
    ];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

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
    protected $fillable = ['user_id', 'post_id', 'comment', 'lang', 'rating', 'status'];

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getPost()
    {
        return $this->hasOne(Post::class, 'id', 'post_id');
    }

    public function commentStatus()
    {
        return self::COMMENT_STATUSES[$this->status];
    }
}
