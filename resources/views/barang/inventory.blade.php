@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Barang
                  <a href="/barang/index" class="ml-4 float-right">
                    <button type="button" class="btn btn-primary btn-sm pw-2">Pinjam</button>
                  </a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($inventory as $inv)
                          @if ($inv->user_id == Auth::user()->id)
                            <tr>
                              <td>{{ $inv->barangs->nama_barang }}</td>
                              <td>{{ $inv->jumlah }}</td>
                              <td>{{ $inv->deskripsi }}</td>
                              <td>
                                <a href="#">Kembalikan</a>
                              </td>
                            </tr>
                          @endif
                          

                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection