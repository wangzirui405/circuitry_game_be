<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $fillable = ['name', 'sex', 'phone', 'avatar', 'description'];

    protected $hidden = ['created_at', 'updated_at'];

    public function password() {
        return $this->hasOne('App\Model\Password');
    }

    public function friend() {
        return $this->hasMany('App\Model\Friend');
    }
}
