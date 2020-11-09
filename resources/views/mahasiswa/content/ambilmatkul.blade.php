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

<legend>Pilih Mata Kuliah yang akan diambil</legend>
<form action="/mahasiswa/pilihkrs" method="POST" role="form">
<div class="row">
<div class="col-md-5 pr-1" style="display:none;">
        <div class="form-group">
            <label for="InputNama">NIM</label>
            <input name="id" class="form-control @error('id') is-invalid @enderror" type="hidden" id="InputNama" value="{{$users->id}}">
            @error('id')<div class="invalid-feedback">{{$message}}</div> @enderror
        </div>
    </div>
    <div class="col-md-5 pr-1">
        <div class="form-group">
            <label for="InputNama">Nama Mahasiswa</label>
            <input name="name" class="form-control @error('name') is-invalid @enderror" disabled id="InputNama" value="{{$users->name}}">
            @error('name')<div class="invalid-feedback">{{$message}}</div> @enderror
        </div>
    </div>
</div>
    {{ csrf_field()}}
    <div class="row">
        <div class="col-md-5 pr-1">
            <label for="nama_matkul">Nama Mata Kuliah</label>
            <br>
            @foreach ($matkul as $m)
            <input type="checkbox" class="custom-control-input" id="customCheck1" name="kode_matkul[]" value="<?= $m->kode_matkul; ?>">(<?= $m->kode_matkul ?>) <?= $m->nama_matkul; ?>(<?= $m->sks; ?> sks)
            <br>
            @endforeach
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection