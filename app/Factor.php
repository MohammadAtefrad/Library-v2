<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Backpack\CRUD\CrudTrait;

/**
 * @property int $id
 * @property int $user_id
 * @property int $factor_status_id
 * @property int $books_number
 * @property string $created_at
 * @property string $updated_at
 * @property FactorStatus $factorStatus
 * @property User $user
 * @property BookFactor[] $bookFactors
 * @property Message[] $messages
 */
class Factor extends Model
{
    use CrudTrait;
    
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'factor_status_id', 'books_number', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function factorStatus()
    {
        return $this->belongsTo('App\FactorStatus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Book');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\Message');
    }
}
