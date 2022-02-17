<?php

namespace App\Http\Controllers\Barang;

use Illuminate\Http\Request;

use App\Barang;
use App\User;
use App\Inventory;

use Auth;


use App\Http\Controllers\Controller;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $user = User::;
        $user = Auth::user()->id;
        
        return view('barang.daftar', ['user' => $user])->with('barang', Barang::paginate(10));

        // return view('barang.daftar')->with('barang', Barang::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //(==========*== Start of Note "ini fitur validasi input untuk nanti"==*==========)

        // $this->validate($request, [
            
        // ], [
            
        // ]);

        //(==========*== End of Note "ini fitur validasi input untuk nanti"==*==========)
        
        // $barang = new Barang;
        // $barang->nama_barang = $request->nama;
        // $barang->satuan = $request->satuan;
        // $barang->stok_awal = $request->stok_awal;


        Barang::create($request->all());
        
        return redirect('barang/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function indexInventory()
    {   
        $inventory = Inventory::all();
        return view('barang/inventory', ['inventory' => $inventory]);
           
    }
    public function formPinjam($id)
    {
        $barang = Barang::find($id);

        return view('barang/formpinjam', ['barang' => $barang]);
    }
    
    public function pinjam( Request $request, $idBarang)
    {
        // dd($idBarang);
        $inventory = new Inventory();   
        $barang = Barang::find($idBarang);
        $user = Auth::user()->id;
        $stok_awal = (int)$barang->stok_awal;
        $jumlah = (int)$request->jumlah;

        if($stok_awal < $jumlah){
            return redirect()->route('barang/formpinjam')->with('warning', 'Jumlah yang diminta melebihi stok yang tersedia');
        }

        $inventory->barang_id = $idBarang;
        $inventory->user_id = $user;
        $inventory->jumlah = $request->jumlah;
        $inventory->deskripsi = $request->deskripsi;
        $inventory->save();

        $jumlah_akhir = $stok_awal - $jumlah;
        

        $barang->stok_awal = $jumlah_akhir;
        $barang->save();
        
        return redirect('inventory/index');
           
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $barang = Barang::find($id);
        return view('barang.editBarang', ['barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $barang = Barang::find($id);
        $barang->update($request->all());
        return redirect('/barang/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Barang::destroy($id);
        return redirect()->back();
    }
}
