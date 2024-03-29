<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $table = 'barang';

    protected $fillable = ['nama_barang', 'satuan', 'stok_awal'];
    
    public function inventory(){
        return $this->hasMany('App\Inventory', 'barang_id', 'id');
    }
}
