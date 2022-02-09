<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $table = 'barang';

    protected $fillable = ['nama_barang', 'satuan', 'stok_awal'];

    public function barangs(){
        return $this->belongsToMany('App\Barang');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
