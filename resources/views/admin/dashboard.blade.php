@extends('admin/layouts/master')

@section('title', 'Halaman Admin')

@section('content')

<h2>Selamat Datang  {{ Auth::user()->name }} di Halaman Dashboard Admin!</h2>

<br><br><br>

<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Role User</h3>
        <p class="card-text">Kelola User Dosen dan Mahasiswa</p>
        <a href="/role" class="btn btn-success">Klik here</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Mata Kuliah</h3>
        <p class="card-text">Kelola Data Mata Kuliah</p>
        <a href="/matkul" class="btn btn-warning">Klik here</a>
      </div>
    </div>
  </div>
</div>
@endsection
