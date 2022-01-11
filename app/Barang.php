<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    public function userStorages()
    {   
        return $this->belongsToMany('App\User');
    }
}
