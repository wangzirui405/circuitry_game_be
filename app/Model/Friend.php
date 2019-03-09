<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    //
    public function user() {
        return $this->hasOne('App\Model\User');
    }
}
