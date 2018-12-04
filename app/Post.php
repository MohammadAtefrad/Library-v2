<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Backpack\CRUD\CrudTrait;

/**
 * @property int $id
 * @property int $post_category_id
 * @property int $post_status_id
 * @property int $user_id
 * @property string $title
 * @property string $body
 * @property string $author
 * @property string $published_date
 * @property PostCategory $postCategory
 * @property PostStatus $postStatus
 * @property User $user
 * @property PostComment[] $postComments
 */
class Post extends Model
{
    use CrudTrait;
    
    /**
     * @var array
     */
    protected $fillable = ['post_category_id', 'post_status_id', 'user_id', 'title', 'body', 'author', 'published_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postCategory()
    {
        return $this->belongsTo('App\PostCategory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postStatus()
    {
        return $this->belongsTo('App\PostStatus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postComments()
    {
        return $this->hasMany('App\PostComment');
    }
}
