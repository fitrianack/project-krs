<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $primaryKey = 'kode_dosen';
    protected $fillable = ['nama_dosen', 'kode_matkul'];

    public function matakuliah()
    {
        return $this->belongsTo('\App\Matakuliah', 'kode_matkul', 'kode_matkul');
    }
}
