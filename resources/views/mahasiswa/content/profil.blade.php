@extends('mahasiswa.layouts.master')

@section('title', 'Profil Mahasiswa')

@section('content')

<legend>Profil Mahasiswa</legend>
<div class="card-body">
    <div class="table-responsive">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5 pr-1">
                    <div class="form-group">
                        <label for="InputNama" style="font-weight: bold;">Nama</label>
                        <input name="name" disabled class="form-control @error('name') is-invalid @enderror" id="InputNama" value="{{$users->name}}" disabsled="disabled">
                    </div>
                </div>

                <div class="col-md-5 pr-1">
                    <div class="form-group">
                        <label for="InputEmail" style="font-weight: bold;">Email</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="InputEmail" value="{{$users->email}}" disabled="disabled">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 pr-1">
                    <div class="form-group">
                        <label for="InputAlamat" style="font-weight: bold;">Password</label>
                        <input name="password" disabled type="password" class="form-control @error('alamat') is-invalid @enderror" id="InputAlamat" value="{{$users->password}}">
                        @error('password')<div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                </div>
            </div>
        </div>
        <a href="/mahasiswa/editprofil" class="btn btn-primary">Edit Profil</a>
    </div>

@endsection