<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dictionary';

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
    protected $fillable = ['code', 'locale_id', 'translate', 'uid'];

    public static function getTranslate($uid, $domainId)
    {
        $dictionary = Dictionary::where(['uid' => $uid, 'locale_id' => $domainId])->first();

        return $dictionary;
    }
}
