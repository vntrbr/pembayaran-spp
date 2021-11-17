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
                <div class="card-header">Update Data</div>

                <div class="card-body">
                <form action="{{route('siswa.update',[$siswaa->id])}}" method="post">
                @csrf
                        {{method_field('PUT')}}
                        <div class="mb-3">
                          <label for="nisn" class="form-label">NISN</label>
                          <input type="text" class="form-control" name="nisn" value={{$siswaa->nisn}} placeholder="Masukkan NISN">
                        </div>

                        <div class="mb-3">
                          <label for="nis" class="form-label">NIS</label>
                          <input type="text" class="form-control" name="nis" value={{$siswaa->nis}} placeholder="Masukkan NIS">
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                          <input type="text" class="form-control" name="nama" value={{$siswaa->nama}} placeholder="Masukkan nama">
                        </div>

                        <div class="mb-3">
                            <label for="id_kelas" class="form-label">ID KELAS</label>
                          <input type="text" class="form-control" name="id_kelas" value={{$siswaa->id_kelas}} placeholder="Masukkan id_kelas" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                          <input type="text" class="form-control" name="alamat" value={{$siswaa->alamat}} placeholder="Masukkan Alamat">
                        </div>

                        <div class="mb-3">
                            <label for="nomor_telp" class="form-label">Nomor Telpon</label>
                          <input type="text" class="form-control" name="nomor_telp" value={{$siswaa->nomor_telp}} placeholder="Masukkan Nomor Telephon">
                        </div>

                        <div class="mb-3">
                            <label for="id_spp" class="form-label">ID SPP</label>
                          <input type="text" class="form-control" name="id_spp" value={{$siswaa->id_spp}} placeholder="Masukkan ID" disabled>
                        </div>



                       
                        <div class="form-group">
                        <button class="btn btn-outline-success">Submit</button>

                    </div>
                </form>
            </div>
        </div>
        <div class="card-header">
        <form action="{{route('siswa.index')}}">
            <button class="btn btn-primary">Home</button>
        </form>
        </div>
        </div>
    </div>
</div>
@endsection
