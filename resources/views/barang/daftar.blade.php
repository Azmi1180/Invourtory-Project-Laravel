@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Barang
                  <a href="/barang/create" class="ml-4 float-right">
                    <button type="button" class="btn btn-primary btn-sm pw-2">Create</button>
                  </a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($barang as $barangs)
                          <tr>
                            <td>{{ $barangs->nama_barang }}</td>
                            <td>{{ $barangs->satuan }}</td>
                            <td>{{ $barangs->stok_awal }}</td>
                            {{-- <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="float-left">
                                  <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                </a>

                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class=" ml-2 float-left">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                              </td> --}}
                              
                              <td>
                                <a href="/barang/pinjam/{{ $barangs->id }}" class="float-left">
                                    <button type="button" class="btn btn-warning btn-sm">Pinjam</button>
                                </a>
                                
                                @hasRole('admin')
                                <a href="/barang/{{ $barangs->id }}/edit" class="ml-4 float-left">
                                    <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                </a>
                                
                                <a href="/barang/{{ $barangs->id }}/delete" class="ml-4 float-left">
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </a>                                
                                @endhasRole

                                @hasRole('staff')
                                <a href="" class="ml-4 float-left">
                                    <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                </a>

                                
                                <a href="" class="ml-4 float-left">
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </a>
                                @endhasRole

                                {{-- @hasRole('staff')
                                <a href="" class="float-left">
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </a>
                                @endhasRole --}}


                              </td>
                              
                          </tr>
                          
                        @endforeach
                        </tbody>
                      </table>
                      {{ $barang->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection