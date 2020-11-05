@extends('mahasiswa/layouts/master')

@section('title', 'Halaman Mahasiswa')

@section('content')

<h2>Selamat Datang di Halaman Dashboard Mahasiswa!</h2>

<br><br><br>

<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Profil</h3>
        <p class="card-text">Kelola Profil</p>
        <a href="/role" class="btn btn-success">Klik here</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Mata Kuliah</h3>
        <p class="card-text">Lihat Mata Kuliah</p>
        <a href="/matkul" class="btn btn-warning">Klik here</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">KRS</h3>
        <p class="card-text">Ambil KRS</p>
        <a href="/matkul" class="btn btn-warning">Klik here</a>
      </div>
    </div>
  </div>
</div>
@endsection
