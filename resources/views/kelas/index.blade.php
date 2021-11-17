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
                <div class="card-header">Data Kelas</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($kelass as $key=>$kelas)
                          <tr>
                            <td >{{$key+1}}</td>
                            <td>{{$kelas->nama_kelas}}</td>
                            <td>{{$kelas->kompetensi_keahlian}}</td>
                            <td>
                            <form action="{{route('kelas.destroy', [$kelas->id])}}" method='POST'>
                              <a href="{{route('kelas.edit',[$kelas->id])}}" class="btn btn-outline-success">Edit</a>
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
            <form action="{{route('kelas.create')}}" method="get">
            <button href="" class="btn btn-outline-success">Tambah Data</button>
            </form>
        </div>
        <div>
        </div>
    </div>
</div>
@endsection
