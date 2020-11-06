@extends('dosen.layouts.master')
@section('title', 'Edit Mata Kuliah')

@section('content')
<form action="/update-proses-dosen/{{$dosen->kode_dosen}}" method="POST" role="form">
    {{ csrf_field()}}
    <legend>Edit Mata Kuliah Dosen</legend>

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