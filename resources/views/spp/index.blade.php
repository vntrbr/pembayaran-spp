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
                <div class="card-header">Data SPP</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Nominal</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($spps as $key=>$spp)
                          <tr>
                            <td >{{$key+1}}</td>
                            <td>{{$spp->tahun}}</td>
                            <td>{{$spp->nominal}}</td>
                            <td>
                            <form action="{{route('spp.destroy', [$spp->id])}}" method='POST'>
                              <a href="{{route('spp.edit',[$spp->id])}}" class="btn btn-outline-success">Edit</a>
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
            <form action="{{route('spp.create')}}" method="get">
            <button href="" class="btn btn-outline-success">Tambah Data</button>
            </form>
        </div>
        <div>
        </div>
    </div>
</div>
@endsection
