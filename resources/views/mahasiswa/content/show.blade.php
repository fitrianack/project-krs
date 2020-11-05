@extends('mahasiswa.layouts.master')
@section('content')

<a href="/mahasiswa/profil" class="btn btn-default pull-right">Tambah</a>

<br><br><br>

<table class="table table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Mata Kuliah</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mahasiswa as $key => $mhs)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$mhs->nim}}</td>
            <td>{{$mhs->nama_mahasiswa}}</td>
            <td>{{$mhs->kode_matkul}}</td>
            <td>
                <a href="/mahasiswa/edit/{{$mhs->id}}" class="btn btn-warning btn-s">Edit</a>
                <a href="/mahasiswa/delete/{{$mhs->id}}" class="btn btn-danger btn-s" onclick="return confirm('Apa anda yakin?')">Delete</a>
            </td>
        </tr>
    @endforeach      
    </tbody>
</table>
@endsection