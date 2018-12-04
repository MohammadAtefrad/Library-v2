<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('article', 'ArticleCrudController');
    CRUD::resource('articlecategory', 'ArticleCategoryCrudController');
    CRUD::resource('articlecomment', 'ArticleCommentCrudController');
    CRUD::resource('articlestatus', 'ArticleStatusCrudController');
    CRUD::resource('book', 'BookCrudController');
    CRUD::resource('bookcategory', 'BookCategoryCrudController');
    CRUD::resource('bookcomment', 'BookCommentCrudController');
    CRUD::resource('bookstatus', 'BookStatusCrudController');
    CRUD::resource('commentstatus', 'CommentStatusCrudController');
    CRUD::resource('factor', 'FactorCrudController');
    CRUD::resource('message', 'MessageCrudController');
    CRUD::resource('messagepriority', 'MessagePriorityCrudController');
    CRUD::resource('messagestatus', 'MessageStatusCrudController');
    CRUD::resource('post', 'PostCrudController');
    CRUD::resource('postcategory', 'PostCategoryCrudController');
    CRUD::resource('postcomment', 'PostCommentCrudController');
    CRUD::resource('poststatus', 'PostStatusCrudController');
    CRUD::resource('role', 'RoleCrudController');
    CRUD::resource('user', 'UserCrudController');
    CRUD::resource('userstatus', 'UserStatusCrudController');
}); // this should be the absolute last line of this file
