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
                <form action="{{route('pembayaran.update',[$pembayarann->id])}}" method="post">
                @csrf
                        {{method_field('PUT')}}
                        <div class="mb-3">
                          <label for="id_petugas" class="form-label">ID Petugas</label>
                          <input type="text" class="form-control" name="id_petugas" value={{$pembayarann->petugas->nama_petugas}} disabled>
                        </div>
        
                        <div class="mb-3">
                          <label for="id_siswa" class="form-label">NISN</label>
                          <input type="text" class="form-control" name="id_siswa" value={{$pembayarann->siswa->nisn}} placeholder="Masukkan NIS" disabled>
                        </div>
                   <div class="mb-3">
                            <label for="spp_bulan" class="form-label">Bulan Pembayaran</label>
                          <select name="spp_bulan" class="form-control" value={{$pembayarann->spp_bulan}}>
                                <option value="">Pilih Bulan</option>
                                <option value="Januari">Januari</option>
                                <option value="Debruari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value=Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
</div>  
                            <div class="mb-3">
                          <label for="tgl_bayar" class="form-label">Tanggal Pembayaran</label>
                          <input type="date" class="form-control" name="tgl_bayar" placeholder="Tanggal Bayar" value={{$pembayarann->tgl_bayar}}>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_bayar" class="form-label">Jumlah SPP</label>
                          <input type="number" class="form-control" name="jumlah_bayar" value={{$pembayarann->jumlah_bayar}}>
                        </div>


                            <div class="mb-3">
                   
                        <div class="form-group">
                        <button class="btn btn-outline-success">Submit</button>

                    </div>
                </form>
            </div>
        </div>
        <div class="card-header">
        <form action="{{route('pembayaran.index')}}">
            <button class="btn btn-primary">Home</button>
        </form>
        </div>
        </div>
    </div>
</div>
@endsection
