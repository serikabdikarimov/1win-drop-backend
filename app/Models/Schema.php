<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schema extends Model
{
    use HasFactory;

    const SCHEMA_TYPES = [
        'faqs' => 'Вопрос ответ',
        'organization' => 'Организация'
    ];
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schemas';

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
    protected $fillable = ['locale_id', 'page_id', 'data', 'schema_type'];
}
