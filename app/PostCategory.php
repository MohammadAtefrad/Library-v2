<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Backpack\CRUD\CrudTrait;

/**
 * @property int $id
 * @property string $post_category
 * @property Post[] $posts
 */
class PostCategory extends Model
{
    use CrudTrait;
    
    /**
     * @var array
     */
    protected $fillable = ['post_category'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
