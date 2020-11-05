<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswas extends Model
{
    protected $table = 'mahasiswas';
    protected $fillable = ['nim', 'nama_mahasiswa'];
}
