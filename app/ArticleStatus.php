<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Backpack\CRUD\CrudTrait;

/**
 * @property int $id
 * @property string $article_status
 * @property Article[] $articles
 */
class ArticleStatus extends Model
{
    use CrudTrait;
    
    /**
     * @var array
     */
    protected $fillable = ['article_status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
