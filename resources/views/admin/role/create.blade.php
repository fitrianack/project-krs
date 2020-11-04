@extends('admin/layouts/master')

@section('title', 'Tambah Role')

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
<form action="/role/create" method="POST" role="form">
{{ csrf_field()}}
    <legend>Tambah Data User</legend>

    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Isikan Nama">
        <small class="block text-danger"></small>
    </div>
    <div class="form-group">
        <label for="nama">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Isikan Email">
        <small class="block text-danger"></small>
    </div>
    <div class="form-group">
        <label for="nama">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Isikan Password">
        <small class="block text-danger"></small>
    </div>
    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-3 pt-0">Role</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="gridRadios1" value="Admin" checked>
                        <label class="form-check-label" for="gridRadios1">
                                Admin
                        </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="gridRadios2" value="Dosen">
                            <label class="form-check-label" for="gridRadios2">
                                Dosen
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="gridRadios2" value="Mahasiswa">
                            <label class="form-check-label" for="gridRadios2">
                                Mahasiswa
                            </label>
                            </div>
                        </div>
                        </div>
    </fieldset>
    <br>
    <button type="submit" class="btn btn-primary">Tambah</button>
    <button type="reset" class="btn btn-warning">Reset</button>

</form>
@endsection