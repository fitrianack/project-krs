@extends('dosen.layouts.master')
@section('title', 'Edit Mata Kuliah Dosen')
@section('content')


<legend>Edit Profil Dosen</legend>
<div class="card-body">
    <div class="table-responsive">
        <form action="/updatepilihmatkul/{{$dosen->id}}" method="POST">
            {{csrf_field()}}
            <div class="custom-control custom-checkbox">
                <label for="nama_matkul">Nama Mata Kuliah</label>
                <br>
                @foreach ($matkul as $mtkl)
                <input name="kode_matkul" type="checkbox" class="custom-control-input" id="customCheck1" name="kode_matkul" value="<?= $mtkl->kode_matkul; ?>">(<?= $mtkl->kode_matkul ?>) <?= $mtkl->nama_matkul; ?>(<?= $mtkl->sks; ?> sks)
                <br>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-5 pr-1">
                    <div class="form-group">
                        <label for="InputKapasitas">Kapasitas</label>
                        <input name="kapasitas" type="text" class="form-control @error('kapasitas') is-invalid @enderror" id="InputEmail">
                        @error('kapasitas')<div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                </div>
            </div>
    </div>

    <button type="submit" class="btn btn-info btn-fill">Edit</button>
    </form>
</div>
</div>

@endsection