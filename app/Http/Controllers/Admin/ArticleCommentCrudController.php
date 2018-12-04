<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ArticleCommentRequest as StoreRequest;
use App\Http\Requests\ArticleCommentRequest as UpdateRequest;

/**
 * Class ArticleCommentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ArticleCommentCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
         */
        $this->crud->setModel('App\ArticleComment');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/articlecomment');
        $this->crud->setEntityNameStrings('articlecomment', 'article_comments');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
         */
        // How disable insert, delete & edit buttons:
        // $this->crud->denyAccess('delete');
        // $this->crud->denyAccess('create');

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();

        // ------ CRUD FIELDS
        $this->crud->addField([
            'name' => 'body',
            'type' => 'text',
            'label' => "Comment Text"
        ]);
        $this->crud->addField([
            'type' => 'select2',
            'name' => 'user_id',
            'label' => 'From User',
            'entity' => 'user',
            'attribute' => 'name',
        ]);
        $this->crud->addField([
            'type' => 'select2',
            'name' => 'article_id',
            'label' => 'For Article',
            'entity' => 'article',
            'attribute' => 'title',
        ]);
        $this->crud->addField([
            'type' => 'select2',
            'name' => 'reference_comment_id',
            'label' => 'Reply to',
            'entity' => 'parent',
            'attribute' => 'body',
        ]);
        $this->crud->addField([
            'type' => 'select2',
            'name' => 'comment_status_id',
            'label' => 'Status',
            'entity' => 'commentStatus',
            'attribute' => 'comment_status',
        ]);

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
            'name' => 'id',
            'type' => 'number',
            'label' => 'Id',
        ]);
        $this->crud->addColumn([
            'name' => 'body',
            'type' => 'text',
            'label' => 'Comment Text',
        ]);
        $this->crud->addColumn([
            'type' => 'select',
            'label' => 'From User',
            'name' => 'user_id',
            'entity' => 'user', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
        ]);
        $this->crud->addColumn([
            'type' => 'select',
            'label' => 'For Article',
            'name' => 'article_id',
            'entity' => 'article', // the method that defines the relationship in your Model
            'attribute' => 'title', // foreign key attribute that is shown to user
        ]);
        $this->crud->addColumn([
            'type' => 'text',
            'label' => 'in Reply to',
            'name' => 'reference_comment_id',
            // 'entity' => 'article', // the method that defines the relationship in your Model
            // 'attribute' => 'title', // foreign key attribute that is shown to user
        ]);
        $this->crud->addColumn([
            'type' => 'select',
            'label' => 'Status',
            'name' => 'comment_status_id',
            'entity' => 'commentStatus', // the method that defines the relationship in your Model
            'attribute' => 'comment_status', // foreign key attribute that is shown to user
        ]);
        $this->crud->addColumn([
            'type' => 'datetime',
            'label' => 'Created Time',
            'name' => 'created_at',
            // 'entity' => 'commentStatus', // the method that defines the relationship in your Model
            // 'attribute' => 'comment_status', // foreign key attribute that is shown to user
        ]);
        $this->crud->addColumn([
            'type' => 'datetime',
            'label' => 'Updated Time',
            'name' => 'updated_at',
            // 'entity' => 'commentStatus', // the method that defines the relationship in your Model
            // 'attribute' => 'comment_status', // foreign key attribute that is shown to user
        ]);


        // add asterisk for fields that are required in ArticleCommentRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $fields = $this->crud->create_fields;
        foreach ($fields as $key=>$value) {
            $request->offsetSet($key, strip_tags($request->$key));
        }

        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $fields = $this->crud->update_fields;
        foreach ($fields as $key=>$value) {
            $request->offsetSet($key, strip_tags($request->$key));
        }

        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
