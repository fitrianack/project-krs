@extends('admin/layouts/master')
@section('title', 'Halaman Mata Kuliah')

@section('content')

<h3>Kelola Mata Kuliah</h3>
<a href="/matkul/create" class="btn btn-default pull-right">Tambah Mata Kuliah</a>

<br><br><br>

<table class="table table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php $no=0; ?>
        @foreach($matkul as $m)
    <?php $no++; ?>
        <tr>
            <td>{{$no}}</td>
            <td>{{$m->nama_matkul}}</td>
            <td>{{$m->sks}}</td>
            <td>
                <a href="/matkul/edit/{{$m->kode_matkul}}" class="btn btn-warning btn-s">Edit</a>
                <a href="/matkul/delete/{{$m->kode_matkul}}" class="btn btn-danger btn-s" onclick="return confirm('Apa anda yakin?')">Delete</a>
            </td>
        </tr>   
        @endforeach  
    </tbody>
</table>
@endsection

