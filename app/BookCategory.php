<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Backpack\CRUD\CrudTrait;

/**
 * @property int $id
 * @property string $book_category
 * @property Book[] $books
 */
class BookCategory extends Model
{
    use CrudTrait;
    
    /**
     * @var array
     */
    protected $fillable = ['book_category'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
