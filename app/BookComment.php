<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Backpack\CRUD\CrudTrait;

/**
 * @property int $id
 * @property int $user_id
 * @property int $book_id
 * @property int $comment_status_id
 * @property string $body
 * @property int $reference_comment_id
 * @property Book $book
 * @property CommentStatus $commentStatus
 * @property User $user
 */
class BookComment extends Model
{
    use CrudTrait;
    
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'book_id', 'comment_status_id', 'body', 'reference_comment_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commentStatus()
    {
        return $this->belongsTo('App\CommentStatus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
