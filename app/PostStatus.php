<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Backpack\CRUD\CrudTrait;

/**
 * @property int $id
 * @property string $post_status
 * @property Post[] $posts
 */
class PostStatus extends Model
{
    use CrudTrait;
    
    /**
     * @var array
     */
    protected $fillable = ['post_status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
