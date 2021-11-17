@extends('layouts.app')
@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">Input Data</div>

                <div class="card-body">
                    <form action="{{route('petugas.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="username" class="form-label">Username</label>
                          <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                        </div>

                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Masukkan password">
                        </div>

                        <div class="mb-3">
                            <label for="nama_petugas" class="form-label">Nama</label>
                          <input type="text" class="form-control" name="nama_petugas" placeholder="Masukkan nama">
                        </div>

                        <div class="mb-3">
                            <label for="level">Level</label>
                            <select name="level" class="form-control">
                                <option value="">Pilih Level</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <button class="btn btn-outline-success">Submit</button>

                    </div>
                </form>
            </div>
        </div>
        <div class="card-header">
        <form action="{{route('petugas.index')}}">
            <button class="btn btn-primary">Home</button>
        </form>
        </div>
        </div>
    </div>
</div>
@endsection
