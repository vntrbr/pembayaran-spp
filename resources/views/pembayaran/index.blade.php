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
                
                <div class="card-header">Entri Pembayaran</div>
                <div class="card-body">
                <form action="{{route('pembayaran.store')}}" method="post">
                        @csrf
                     
                        <div class="mb-3">
                            <label for="id_petugas" class="form-label">ID PETUGAS</label>
                            <select name="id_petugas"  class="form-control" id="kelas">
                            @if(count($petugas) == 0)											
                              <option>Pilihan tidak ada</option>
                           @else											
                              <option value="">Silahkan Pilih</option>											
                                 @foreach($petugas as $value) 			
                                    <option value="{{ $value->id_petugas }}">{{ $value->username }}</option>
                                 @endforeach
                           @endif	
                       </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_siswa" class="form-label">ID SISWA</label>
                            <select name="id_siswa"  class="form-control" id="id_siswa">
                            @if(count($siswa) == 0)											
                              <option>Pilihan Tidak ada</option>
                           @else	
                           <option>Silahkan Pilih</option>																					
                                 @foreach($siswa as $value) 			
                                    <option value="{{ $value->id }}">{{ $value->nisn }}</option>
                                 @endforeach
                           @endif	
                           </div> 
                          </select>
</form>

                        <div class="mb-3">
                            <label for="spp_bulan">Bulan Pembayaran</label>
                            <select name="spp_bulan" class="form-control">
                                <option value="">Pilih Bulan</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="Juni">Juni</option>
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
                          <input type="date" class="form-control" name="tgl_bayar" placeholder="Tanggal Bayar">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_bayar" class="form-label">Jumlah SPP</label>
                          <input type="number" class="form-control" name="jumlah_bayar" placeholder="Masukkan Nama">
                        </div>
                     
                        <div class="form-group">
                        <button class="btn btn-outline-success">Submit</button>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>ID PETUGAS</th>
                            <th>ID SISWA</th>
                            <th>Nama Siswa</th>
                            <th>Bulan</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($pembayarann as $key=>$pembayaran)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$pembayaran->petugas->username}}</td>
                            <td>{{$pembayaran->siswa->nisn}}</td>
                           <td> {{$pembayaran->siswa->nama}}</td>
                            <td>{{$pembayaran->spp_bulan}}</td>
                            <td>{{$pembayaran->tgl_bayar}}</td>
                            <td>{{$pembayaran->jumlah_bayar}}</td>
                              <td>
                            <form action="{{route('pembayaran.destroy', [$pembayaran->id])}}" method='POST'>
                              @csrf
                              {{method_field('DELETE')}}
                              <a href="{{route('pembayaran.edit',[$pembayaran->id])}}" class="btn btn-outline-success">Edit</a>
                              <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </td>
                            </form>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            
            
        </div>
        <div>
        </div>
    </div>
</div>
@endsection