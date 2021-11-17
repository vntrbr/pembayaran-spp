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
                
                <div class="card-header">Data Siswa</div>
                <div class="card-body">
                <form action="{{route('siswa.store')}}" method="post">
                        @csrf
                     
                        <div class="mb-3">
                          <label for="nisn" class="form-label">NISN</label>
                          <input type="text" class="form-control" name="nisn" placeholder="Masukkan NISN">
                        </div>

                        <div class="mb-3">
                          <label for="nis" class="form-label">NIS</label>
                          <input type="text" class="form-control" name="nis" placeholder="Masukkan Username">
                        </div>
            
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                          <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="mb-3">
                            <label for="id_kelas" class="form-label">ID KELAS</label>
                            <select name="id_kelas"  class="form-control" id="kelas">
                            @if(count($kelas) == 0)											
                              <option>Pilihan tidak ada</option>
                           @else											
                              <option value="">Silahkan Pilih</option>											
                                 @foreach($kelas as $value) 			
                                    <option value="{{ $value->id }}">{{ $value->id }}</option>
                                 @endforeach
                           @endif	
                       </select>
                        </div>
                        <div class="mb-3">
                          <label for="alamat" class="form-label">Alamat</label>
                          <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat">
                        </div>
                        <div class="mb-3">
                          <label for="nomor_telp" class="form-label">Nomor Telephone</label>
                          <input type="text" class="form-control" name="nomor_telp" placeholder="Masukkan Telephone">
                        </div>
                        <div class="mb-3">
                            <label for="id_spp" class="form-label">ID SPP</label>
                            <select name="id_spp"  class="form-control" id="id_spp">
                            @if(count($spp) == 0)											
                              <option>Pilihan ga ada</option>
                           @else	
                           <option>Silahkan Pilih</option>																					
                                 @foreach($spp as $value) 			
                                    <option value="{{ $value->id }}">{{ $value->id }}</option>
                                 @endforeach
                           @endif	
                           </div> 
                          </select>
</form>
                        <div class="form-group">
                        <button class="btn btn-outline-success">Submit</button>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Nomor Telephone</th>
                            <th>Alamat</th>
                            <th>ID</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($siswaa as $key=>$siswa)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$siswa->nisn}}</td>
                            <td>{{$siswa->nis}}</td>
                            <td>{{$siswa->nama}}</td>
                            <td>{{$siswa->kelas->nama_kelas}}{{$siswa->kelas->kompetensi_keahlian}}</td>
                            <td>{{$siswa->nomor_telp}}</td>
                              <td>{{$siswa->alamat}}</td>
                              <td>{{$siswa->id_spp}}</td>
                              <td>
                              {{method_field('DELETE')}}
                            <form action="{{route('siswa.destroy', [$siswa->id])}}" method='POST'>
                              <a href="{{route('siswa.edit',[$siswa->id])}}" class="btn btn-outline-success">Edit</a>
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
            
            
        </div>
        <div>
        </div>
    </div>
</div>
@endsection