<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Backpack\CRUD\CrudTrait;

/**
 * @property int $id
 * @property string $comment_status
 * @property ArticleComment[] $articleComments
 * @property BookComment[] $bookComments
 * @property PostComment[] $postComments
 */
class CommentStatus extends Model
{
    use CrudTrait;
    
    /**
     * @var array
     */
    protected $fillable = ['comment_status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articleComments()
    {
        return $this->hasMany('App\ArticleComment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookComments()
    {
        return $this->hasMany('App\BookComment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postComments()
    {
        return $this->hasMany('App\PostComment');
    }
}
