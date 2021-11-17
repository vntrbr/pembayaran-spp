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
                
                <div class="card-header">Data Petugas</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama Petugas</th>
                            <th>Level</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($petugass as $key=>$petugas)
                          <tr>
                            <td >{{$key+1}}</td>
                            <td>{{$petugas->username}}</td>
                            <td>{{$petugas->nama_petugas}}</td>
                            <td>{{$petugas->level}}</td>
                            <td>
                            <form action="{{route('petugas.destroy', [$petugas->id_petugas])}}" method='POST'>
                              <a href="{{route('petugas.edit',[$petugas->id_petugas])}}" class="btn btn-outline-success">Edit</a>
                               @csrf
                               {{method_field('DELETE')}}
                               <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </td>
                            </form>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            <form action="{{route('petugas.create')}}" method="get">
            <button href="" class="btn btn-outline-success">Tambah Data</button>
            </form>
        </div>
        <div>
        </div>
    </div>
</div>
@endsection