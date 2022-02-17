@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pinjam {{ $barang->nama_barang }}</div>

                <div class="card-body">
                    <form action="/barang/{{$barang->id}}/pinjam" method="POST">
                        {{ csrf_field() }}

                        <label for="nama" class="control-label mt-3">Nama Barang</label>
                        <p name="nama_barang" class="form-control">{{ $barang->nama_barang }}</p>
                        
                        <label for="recipient-name" class="control-label mt-4">Jumlah Barang yang ingin dipinjam</label>
                        <input type="text" name="jumlah" class="form-control" >

                        <label for="recipient-name" class="control-label mt-4">Jumlah Stok Saat ini</label>
                        <p>{{ $barang->stok_awal }}</p>
                        
                        <label for="recipient-name" class="control-label mt-4">Deskripsi</label>
                        <textarea name="deskripsi" id="textarea" cols="30" rows="10"></textarea>

                        <button type="submit" class="btn btn-primary mt-4">Pinjam</button>
                        {{-- <a href="/barang/edit/{{ $barang->id }}/"></a> --}}
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection