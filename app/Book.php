<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Backpack\CRUD\CrudTrait;

/**
 * @property int $id
 * @property int $book_category_id
 * @property int $book_status_id
 * @property string $name
 * @property string $publisher
 * @property string $author
 * @property string $description
 * @property string $published_date
 * @property float $penalty_value
 * @property string $borrowed_date
 * @property string $return_deadline_date
 * @property string $return_date
 * @property int $reborrowe_count
 * @property BookCategory $bookCategory
 * @property BookStatus $bookStatus
 * @property BookComment[] $bookComments
 * @property Factor[] $factors
 * @property User[] $users
 */
class Book extends Model
{
    use CrudTrait;

  /*
  |--------------------------------------------------------------------------
  | GLOBAL VARIABLES
  |--------------------------------------------------------------------------
  */

  protected $table = 'books';
  protected $primaryKey = 'id';
    /**
     * @var array
     */
    protected $fillable = ['book_category_id', 'book_status_id', 'name', 'publisher', 'author', 'description', 'published_date', 'penalty_value', 'borrowed_date', 'return_deadline_date', 'return_date', 'reborrowe_count'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bookCategory()
    {
        return $this->belongsTo('App\BookCategory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bookStatus()
    {
        return $this->belongsTo('App\BookStatus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookComments()
    {
        return $this->hasMany('App\BookComment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function factors()
    {
        return $this->belongsToMany('App\Factor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
