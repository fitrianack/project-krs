@extends('admin/layouts/master')

@section('title', 'Edit Mata Kuliah')

@section('content')

@if(Session::has('alert danger'))
    <div class="form-group alert alert-danger">
        <div>{{Session::get('alert danger')}}</div>
    </div>
@endif
@if(Session::has('alert success'))
    <div class="form-group alert alert-success">
            <div>{{Session::get('alert success')}}</div>
    </div>
@endif
<form action="/matkul/update" method="POST" role="form">
{{ csrf_field()}}
    <legend>Edit Data Mata Kuliah</legend>

    <input type="hidden" name="kode_matkul" value="{{$matkul->kode_matkul}}">
    <div class="form-group">
        <label for="nama">Nama Mata Kuliah</label>
        <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" value="{{$matkul->nama_matkul}}" placeholder="Isikan Nama Mata Kuliah...">
        <small class="block text-danger"></small>
    </div>
    <div class="form-group">
        <label for="nama">SKS</label>
        <input type="text" class="form-control" id="sks" name="sks" value="{{$matkul->sks}}" placeholder="Isikan Jumlah SKS...">
        <small class="block text-danger"></small>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Tambah</button>
    <button type="reset" class="btn btn-warning">Reset</button>

</form>
@endsection