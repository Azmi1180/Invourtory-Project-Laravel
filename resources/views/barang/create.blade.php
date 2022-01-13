@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Create Barang
                  
                </div>
                <div class="card-body">
                    <form action="/barang/store" method="POST">
                        {{ csrf_field() }}                     

                        <label for="nama" class="control-label mt-3">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" id="recipient-name1" value="">
                        
                        <label for="nama" class="control-label mt-3">Satuan</label>
                        {{-- <input type="text" name="nama" class="form-control" id="recipient-name1" value=""> --}}
                        <select class="custom-select" name="satuan">
                            <option selected disabled>Pilih Satuan Yang Anda Inginkan</option>
                            <option value="PCS">PCS</option>
                            <option value="SET">SET</option>
                            <option value="PACK">PACK</option>
                            
                        </select>

                        <label for="nama" class="control-label mt-3">Stok Awal</label>
                        <input type="text" name="stok_awal" class="form-control" id="recipient-name1" value="">
                                                
                        <button type="submit" class="btn btn-primary mt-4 float-right">Create</button>
                        
                        
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection