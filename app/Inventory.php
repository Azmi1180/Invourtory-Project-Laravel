<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $table = 'inventory';

    protected $fillable = ['barang_id', 'user_id', 'deskripsi', 'jumlah'];

    public function barangs(){
        return $this->belongsTo('App\Barang', 'barang_id', 'id');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
