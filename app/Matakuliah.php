<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $primaryKey = 'kode_matkul';

    protected $fillable = ['kode_matkul', 'nama_matkul', 'sks'];

    public function dosen()
    {
        return $this->hasOne('\App\Dosen', 'kode_dosen', 'kode_dosen');
    }

    public function users()
    {
        return $this->hasMany('\App\User', 'kode_matkul', 'kode_matkul');
    }

    public function krs()
    {
        return $this->hasMany('\App\Krs', 'kode_matkul', 'kode_matkul');
    }
}
