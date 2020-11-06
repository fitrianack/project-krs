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
        <a href="/mahasiswa/profil" class="btn btn-success">Klik here</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">KRS</h3>
        <p class="card-text">Pilih KRS</p>
        <a href="/mahasiswa/lihatkrs" class="btn btn-warning">Klik here</a>
      </div>
    </div>
  </div>
  </div>
@endsection
