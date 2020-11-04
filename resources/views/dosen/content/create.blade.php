@extends('dosen.layouts.master')
@section('title', 'Halaman Dosen')

@section('content')

<form action="/create-proses-dosen" method="POST" role="form">
    {{ csrf_field()}}
    <legend>Tambah Data Dosen</legend>

    <div class="form-group">
        <label for="nama">Nama Dosen</label>
        <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" placeholder="Isikan Nama">
        <small class="block text-danger"></small>
    </div>
    <div class="custom-control custom-checkbox">
        <label for="nama_matkul">Nama Mata Kuliah</label>
        <br>
        @foreach ($matkul as $mtkl)
        <input name="kode_matkul" type="checkbox" class="custom-control-input" id="customCheck1" name="kode_matkul" value="<?= $mtkl->kode_matkul; ?>">(<?= $mtkl->kode_matkul ?>) <?= $mtkl->nama_matkul; ?>(<?= $mtkl->sks; ?> sks)
        <br>
        @endforeach
    </div>
    <!-- <div class="form-group">
        <label for="nama_matkul">Nama Mata Kuliah</label>
        <select name="kode_matkul" id="input" class="form-control" required="required">
            @foreach ($matkul as $mtkl)
            <option value="<?= $mtkl->kode_matkul; ?>">(<?= $mtkl->kode_matkul ?>) <?= $mtkl->nama_matkul; ?></option>
            @endforeach
        </select>
    </div> -->
    <br>
    <button type="submit" class="btn btn-primary">Tambah</button>

</form>
@endsection