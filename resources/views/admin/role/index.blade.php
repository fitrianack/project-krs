@extends('admin/layouts/master')
@section('title', 'Halaman Role User')

@section('content')

<h3>Kelola User</h3>
<a href="/role/create" class="btn btn-default pull-right">Tambah User</a>

<br><br><br>

<table class="table table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php $no=0; ?>
        @foreach($user as $u)
    <?php $no++; ?>
        <tr>
            <td>{{$no}}</td>
            <td>{{$u->name}}</td>
            <td>{{$u->email}}</td>
            <td>{{$u->role}}</td>
            <td>
                <a href="/role/edit/{{$u->id}}" class="btn btn-warning btn-s">Edit</a>
                <a href="/role/delete/{{$u->id}}" class="btn btn-danger btn-s" onclick="return confirm('Apa anda yakin?')">Delete</a>
            </td>
        </tr>   
        @endforeach  
    </tbody>
</table>
@endsection

