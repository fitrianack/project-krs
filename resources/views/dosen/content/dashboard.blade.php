@extends('dosen.layouts.master')
@section('title', 'Dashboard Dosen')

@section('content')
<legend>Daftar Mata Kuliah Yang Diampu</legend>
<div class="card">
    <!-- Tab panes -->
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th style="color: black;">Kode Dosen</th>
                    <th style="color: black;">Kode Mata Kuliah yang diampu</th>
                    <th style="color: black;">Kapasitas</th>
                    <th style="color: black;">Aksi</th>
                </tr>
                <tr>
                    <?php $no = 0; ?>
                    @foreach($dosenn as $d)
                    <?php $no++; ?>
                <tr>
                    <td>{{$d->nidn}}</td>
                    <td>{{$d->kode_matkul}}</td>
                    <td>{{$d->kapasitas}}</td>
                    <td>
                        <a href="/edit-matkul/{{$d->id}}" class="btn btn-info">
                            <i class="fa fa-pencil-square-o" aria-hidden="true">Edit</i>
                        </a>
                        <a href="/hapus-matkul/{{$d->id}}" class="btn btn-danger" onclick="return confirm('Yakin mau dihapus ?')">
                            <i class="fa fa-trash" aria-hidden="true">Hapus</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection