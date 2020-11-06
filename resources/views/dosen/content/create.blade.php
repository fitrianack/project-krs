@extends('dosen.layouts.master')
@section('title', 'Pilih Mata Kuliah')

@section('content')
<legend>Daftar Mata Kuliah</legend>
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


<form action="/create-proses-dosen" method="POST" role="form">
    {{ csrf_field()}}
    <legend>Pilih Mata Kuliah yang akan diampu</legend>

    <div class="row">
        <div class="col-md-5 pr-1">
            <div class="form-group">
                <label for="InputNama">Nama Dosen</label>
                <input name="name" disabled class="form-control @error('name') is-invalid @enderror" id="InputNama" value="{{$users->name}}">
                @error('name')<div class="invalid-feedback">{{$message}}</div> @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 pr-1">
            <label for="nama_matkul">Nama Mata Kuliah</label>
            <br>
            @foreach ($matkul as $mtkl)
            <input name="kode_matkul" type="checkbox" class="custom-control-input" id="customCheck1" name="kode_matkul" value="<?= $mtkl->kode_matkul; ?>">(<?= $mtkl->kode_matkul ?>) <?= $mtkl->nama_matkul; ?>(<?= $mtkl->sks; ?> sks)
            <br>
            @endforeach
        </div>
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