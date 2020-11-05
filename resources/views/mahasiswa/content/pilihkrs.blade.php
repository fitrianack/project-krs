@extends('mahasiswa/layouts/master')

@section('title', 'Lihat KRS')

@section('content')

<a href="/mahasiswa/pilihkrs" class="btn btn-default pull-right">Tambah</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Kode Mata Kuliah</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($krs as $key => $krs)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$krs->nim}}</td>
            <td>{{$krs->kode_matkul}}</td>
            <td>
                <a href="" class="btn btn-warning btn-s">Edit</a>
                <a href="" class="btn btn-danger btn-s" onclick="return confirm('Apa anda yakin?')">Delete</a>
            </td>
        </tr>
    @endforeach      
    </tbody>
</table>
@endsection