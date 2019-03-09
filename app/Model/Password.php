<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    //
    protected $fillable = ['user_id', 'password'];

    protected $hidden = ['user_id', 'password'];

    public function user() {
        return $this->hasOne('App\Model\User');
    }
}
