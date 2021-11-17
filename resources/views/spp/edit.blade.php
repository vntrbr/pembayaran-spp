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
                    <form action="{{route('spp.update',[$spps->id])}}" method="post">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="mb-3">
                          <label for="tahun" class="form-label">Tahun</label>
                          <input type="number" class="form-control" name="tahun" value={{$spps->tahun}}>
                        </div>

                        <div class="mb-3">
                          <label for="nominal" class="form-label">Nominal</label>
                          <input type="number" class="form-control" name="nominal" value={{$spps->nominal}}>
                        </div>
                        <div class="form-group">
                        <button class="btn btn-outline-success">Submit</button>

                    </div>
                </form>
            </div>
        </div>
        <div class="card-header">
        <form action="{{route('spp.index')}}">
            <button class="btn btn-primary">Home</button>
        </form>
        </div>
        </div>
    </div>
</div>
@endsection
