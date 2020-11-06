@extends('mahasiswa/layouts/master')

@section('title', 'Ambil KRS')

@section('content')
<legend>Pilih Mata Kuliah</legend>
<table class="table table-bordered">
    <tbody>
        <tr>
            <th style="color: black;">Kode Mata Kuliah</th>
            <th style="color: black;">Nama Mata Kuliah</th>
            <th style="color: black;">SKS</th>
        </tr>
        <tr>
            <?php $no = 0; ?>
            @foreach($matkul as $m)
            <?php $no++; ?>
        <tr>
            <td>{{$m->kode_matkul}}</td>
            <td>{{$m->nama_matkul}}</td>
            <td>{{$m->sks}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<form action="/pilih-matkul" method="POST" role="form">
    {{ csrf_field()}}
    <legend>Pilih Mata Kuliah yang akan diambil</legend>
<div class="row">
<div class="col-md-5 pr-1">
        <div class="form-group">
            <label for="InputNama">NIM</label>
            <input name="id" disabled class="form-control @error('id') is-invalid @enderror" id="InputNama" value="{{$users->id}}">
            @error('id')<div class="invalid-feedback">{{$message}}</div> @enderror
        </div>
    </div>
    <div class="col-md-5 pr-1">
        <div class="form-group">
            <label for="InputNama">Nama Mahasiswa</label>
            <input name="name" disabled class="form-control @error('name') is-invalid @enderror" id="InputNama" value="{{$users->name}}">
            @error('name')<div class="invalid-feedback">{{$message}}</div> @enderror
        </div>
    </div>
</div>
    <div class="row">
    <div class="row">
        <div class="col-md-5 pr-1">
            <label for="nama_matkul">Kode Mata Kuliah</label>
            <br>
            @foreach ($krs as $k)
            <input name="kode_matkul" type="checkbox" class="custom-control-input" id="customCheck1" name="kode_matkul" value="<?= $k->kode_matkul; ?>">(<?= $k->kode_matkul ?>) <?= $k->nama_matkul; ?>(<?= $k->sks; ?> sks)
            <br>
            @endforeach
        </div>
    </div>
        <div class="col-md-5 pr-1">
            <label for="nama_matkul">Nama Mata Kuliah</label>
            <br>
            @foreach ($krs as $k)
            <input name="kode_matkul" type="checkbox" class="custom-control-input" id="customCheck1" name="kode_matkul" value="<?= $k->kode_matkul; ?>">(<?= $k->kode_matkul ?>) <?= $k->nama_matkul; ?>(<?= $k->sks; ?> sks)
            <br>
            @endforeach
        </div>
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Tambah</button>

</form>