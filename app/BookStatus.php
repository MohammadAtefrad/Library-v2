<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Backpack\CRUD\CrudTrait;

/**
 * @property int $id
 * @property string $book_status
 * @property Book[] $books
 */
class BookStatus extends Model
{
    use CrudTrait;
    
    /**
     * @var array
     */
    protected $fillable = ['book_status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
