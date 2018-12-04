<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Backpack\CRUD\CrudTrait;

/**
 * @property int $id
 * @property string $article_category
 * @property Article[] $articles
 */
class ArticleCategory extends Model
{
    use CrudTrait;
    
    /**
     * @var array
     */
    protected $fillable = ['article_category'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
