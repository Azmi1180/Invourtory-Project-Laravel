<?php

namespace App\Http\Controllers\Barang;

use Illuminate\Http\Request;
use App\Barang;
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
        // $barang = Barang::all();

        // return view('barang.daftar', ['barang' => $barang])->with('barang', Barang::paginate(10));
        return view('barang.daftar')->with('barang', Barang::paginate(10));
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
    public function show($id)
    {
        //
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
