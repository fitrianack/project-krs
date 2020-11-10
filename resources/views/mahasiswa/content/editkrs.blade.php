@extends('mahasiswa.layouts.master')

@section('title', 'Edit KRS')

@section('content')

<legend>KRS Mahasiswa</legend>
<div class="card-body">
    <div class="table-responsive">
    <form action="/mahasiswa/updatekrs/{{$krs->id}}" method="POST" role="form">
</div>
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{$krs->id}}">
    <div class="row">
        <div class="col-md-5 pr-1">
            <label for="nama_matkul">Nama Mata Kuliah</label>
            <br>
            @foreach ($mk as $m)
            <input type="checkbox" class="custom-control-input" id="customCheck1" name="kode_matkul" value="<?= $m->kode_matkul; ?>">(<?= $m->kode_matkul ?>) <?= $m->nama_matkul; ?>(<?= $m->sks; ?> sks)
            <br>
            @endforeach
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
    </div>

@endsection