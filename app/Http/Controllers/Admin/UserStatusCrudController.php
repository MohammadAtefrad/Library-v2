<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\UserStatusRequest as StoreRequest;
use App\Http\Requests\UserStatusRequest as UpdateRequest;

/**
 * Class UserStatusCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class UserStatusCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\UserStatus');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/userstatus');
        $this->crud->setEntityNameStrings('userstatus', 'user_statuses');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in UserStatusRequest
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
