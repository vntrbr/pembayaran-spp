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
                <div class="card-header">Edit Data</div>

                <div class="card-body">
                    <form action="{{route('kelas.update',[$kelass->id])}}" method="post">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="mb-3">
                          <label for="nama_kelas" class="form-label">Kelas</label>
                          <input type="text" class="form-control" name="nama_kelas" value={{$kelass->nama_kelas}}>
                        </div>

                        <div class="mb-3">
                          <label for="kompetensi_keahlian" class="form-label">Jurusan</label>
                          <input type="text" class="form-control" name="kompetensi_keahlian" value ={{$kelass->kompetensi_keahlian}}>
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
