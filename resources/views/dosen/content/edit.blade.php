@extends('dosen.layouts.master')
@section('title', 'Edit Data Dosen')

@section('content')


<legend>Edit Profil Dosen</legend>
<div class="card-body">
    <div class="table-responsive">
        <form action="/updatedatadosen" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-5 pr-1">
                    <div class="form-group">
                        <label for="InputNama">Nama</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="InputNama" value="{{$users->name}}">
                        @error('name')<div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                </div>

                <div class="col-md-5 pr-1">
                    <div class="form-group">
                        <label for="InputEmail">Email</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="InputEmail" value="{{$users->email}}">
                        @error('email')<div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-5 pr-1">
                    <div class="form-group">
                        <label for="InputPassword">Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="InputPassword" value="{{$users->password}}">
                        @error('password')<div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info btn-fill">Edit</button>
        </form>
    </div>
</div>

@endsection