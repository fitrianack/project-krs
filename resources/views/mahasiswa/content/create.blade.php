@extends('layouts/master')

@section('title', 'Halaman Mahasiswa')

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
<form action="/mahasiswa/content/create" method="POST" role="form">
{{ csrf_field()}}
    <legend>Tambah Data Mahasiswa</legend>

    <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" placeholder="Isikan NIM" >
        <small class="block text-danger"></small>
    </div>

    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama_mahasiswa" placeholder="Isikan Nama">
        <small class="block text-danger"></small>
    </div>
    <div class="form-group row">
		<label for="inputPassword3" class="col-sm-2 col-form-label">Mata Kuliah</label>
		    <div class="col-sm-10">
				<select name="kode_matkul" class="form-control" id="">
					@foreach($matakul as $m)
					<option value="{{$m->kode_matkul}}">{{$m->kode_matkul}} - {{$m->nama_matkul}}</option>
					@endforeach
				</select>
			</div>
	</div>

