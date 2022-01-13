@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit {{ $barang->name }}</div>

                <div class="card-body">
                    <form action="/barang/{{$barang->id}}/update" method="POST">
                        {{ csrf_field() }}

                        <label for="nama" class="control-label mt-3">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" id="recipient-name1" value="{{ $barang->nama_barang }}">
                        
                        <label for="recipient-name" class="control-label mt-4">Satuan</label>
                        <input type="text" name="satuan" class="form-control"  value="{{ $barang->satuan }}">

                        <label for="recipient-name" class="control-label mt-4">Stok</label>
                        <input type="text" name="stok_awal" class="form-control"  value="{{ $barang->stok_awal }}">
                        
                        <button type="submit" class="btn btn-primary mt-4">Update</button>
                        {{-- <a href="/barang/edit/{{ $barang->id }}/"></a> --}}
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection