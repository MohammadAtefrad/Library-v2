<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Backpack\CRUD\CrudTrait;

/**
 * @property int $id
 * @property int $article_category_id
 * @property int $article_status_id
 * @property string $title
 * @property string $publisher
 * @property string $authors
 * @property string $abstract
 * @property string $published_date
 * @property string $keywords
 * @property string $download_link
 * @property int $download_count
 * @property ArticleCategory $articleCategory
 * @property ArticleStatus $articleStatus
 * @property ArticleComment[] $articleComments
 * @property User[] $users
 */
class Article extends Model
{
    use CrudTrait;

    /**
     * @var array
     */
    protected $fillable = ['article_category_id', 'article_status_id', 'title', 'publisher', 'authors', 'abstract', 'published_date', 'keywords', 'download_link', 'download_count'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function articleCategory()
    {
        return $this->belongsTo('App\ArticleCategory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function articleStatus()
    {
        return $this->belongsTo('App\ArticleStatus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articleComments()
    {
        return $this->hasMany('App\ArticleComment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
