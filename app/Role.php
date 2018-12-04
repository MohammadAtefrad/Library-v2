<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Backpack\CRUD\CrudTrait;

/**
 * @property int $id
 * @property string $role
 * @property User[] $users
 */
class Role extends Model
{
    use CrudTrait;

    /**
     * @var array
     */
    protected $fillable = ['role'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
