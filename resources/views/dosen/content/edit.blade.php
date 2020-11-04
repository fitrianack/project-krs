@extends('dosen.layouts.master')
@section('title', 'Edit Data Dosen')

@section('content')

<form action="/update-proses-dosen/{{$dosen->kode_dosen}}" method="POST" role="form">
    {{ csrf_field()}}
    <legend>Edit Data Dosen</legend>

    <div class="form-group">
        <label>Data Lama</label>
        <br>
        <br>
        <label>Nama Dosen</label>
        <input name="nama_dosen" disabled class="form-control @error('nama_dosen') is-invalid @enderror" value="{{$dosen->nama_dosen}}">
        @error('nama_dosen')<div class="invalid-feedback">{{$message}}</div> @enderror
    </div>
    <div>
        <label>Kode Mata Kuliah</label>
        <input name="kode_matkul" disabled class="form-control @error('kode_matkul') is-invalid @enderror" value="{{$dosen->kode_matkul}}">
        @error('kode_matkul')<div class="invalid-feedback">{{$message}}</div> @enderror
    </div>

    <br>
    <br>
    <label for="">Data Baru</label>
    <br>
    <div class="form-group">
        <label>Nama Dosen</label>
        <input name="nama_dosen" type="text" class="form-control @error('nama_dosen') is-invalid @enderror" value="{{$dosen->nama_dosen}}">
        @error('nama_dosen')<div class="invalid-feedback">{{$message}}</div> @enderror
    </div>
    <div class="custom-control custom-checkbox">
        <label for="nama_matkul">Nama Mata Kuliah</label>
        <br>
        @foreach ($matkul as $mtkl)
        <input name="kode_matkul" type="checkbox" class="custom-control-input" id="customCheck1" name="kode_matkul" value="<?= $mtkl->kode_matkul; ?>">(<?= $mtkl->kode_matkul ?>) <?= $mtkl->nama_matkul; ?>(<?= $mtkl->sks; ?> sks)
        <br>
        @endforeach
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Edit</button>

</form>
@endsection