@extends('dosen.layouts.master')
@section('title', 'Halaman Dosen')

@section('content')
<div class="card">
    <!-- Tab panes -->
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th style="color: black;">No</th>
                    <th style="color: black;">Kode Dosen</th>
                    <th style="color: black;">Nama Dosen</th>
                    <th style="color: black;">Kode Mata Kuliah</th>
                    <th style="color: black;">Aksi</th>
                </tr>
                <tr>
                    <?php $no = 0; ?>
                    @foreach($dosen as $d)
                    <?php $no++; ?>
                <tr>
                    <td>{{$no}}</td>
                    <td>{{$d->kode_dosen}}</td>
                    <td>{{$d->nama_dosen}}</td>
                    <td>{{$d->kode_matkul}}</td>
                    <td>
                        <a href="/update-dosen/{{$d->kode_dosen}}" class="btn btn-info">
                            <i class="fa fa-pencil-square-o" aria-hidden="true">Edit</i>
                        </a>

                        <a href="/hapus-dosen/{{$d->kode_dosen}}" class="btn btn-danger" onclick="return confirm('Yakin mau dihapus ?')">
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