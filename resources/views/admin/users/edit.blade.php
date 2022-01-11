@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit {{ $user->name }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.users.update', ['user' => $user->id ]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="nama" class="control-label mt-3">Nama</label>
                        <input type="text" name="name" class="form-control" id="recipient-name1" value="{{ $user->name }}">
                        
                        <label for="recipient-name" class="control-label mt-4">Email</label>
                        <input type="email" name="email" class="form-control"  value="{{ $user->email }}">                        
                        
                        
                        <label for="recipient-name" class="control-label mt-4">Role</label>
                        {{-- <select class="custom-select" name="roles[]"  value="{{ $roles->id }}">
                            @foreach ($roles as $role)
                            <option selected disabled> </option>
                            <option value="user" @if($user->role == 'user') selected @endif>User</option>
                            <option value="partner" @if($user->role == 'partner') selected @endif>Partner</option>
                            <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                            <option name="" value="{{ $role->id }}" {{ $user->hasAnyRole($role->name)? 'selected': '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select> --}}
                        @foreach ($roles as $role)
                            <div class="form-check mt-1">
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ $user->hasAnyRole($role->name)? 'checked': '' }}>
                                <label>{{ $role->name }}</label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary mt-4">Update</button>
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection