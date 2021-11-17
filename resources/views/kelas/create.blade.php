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
                    <form action="{{route('kelas.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="nama_kelas" class="form-label">Kelas</label>
                          <input type="text" class="form-control" name="nama_kelas" placeholder="Masukkan Kelas">
                        </div>

                        <div class="mb-3">
                          <label for="kompetensi_keahlian" class="form-label">Jurusan</label>
                          <input type="text" class="form-control" name="kompetensi_keahlian" placeholder="Masukkan Jurusan">
                        </div>
                        <div class="form-group">
                        <button class="btn btn-outline-success">Submit</button>

                    </div>
                </form>
            </div>
        </div>
        <div class="card-header">
        <form action="{{route('kelas.index')}}">
            <button class="btn btn-primary">Home</button>
        </form>
        </div>
        </div>
    </div>
</div>
@endsection
