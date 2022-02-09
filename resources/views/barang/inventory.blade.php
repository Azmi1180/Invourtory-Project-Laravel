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
                            <th scope="col">Satuan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class=""></td>
                          </tr>

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection