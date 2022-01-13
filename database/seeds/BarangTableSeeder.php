<?php

use Illuminate\Database\Seeder;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        
        DB::table('barang')->insert([
            [
                'nama_barang' => "Pensil",
                'satuan' => "PCS",
                'stok_awal' => "20",
            ],
        ]);
    
        
    }
}
