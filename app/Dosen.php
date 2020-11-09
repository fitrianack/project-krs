<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = ['nidn', 'kode_matkul'];

    public function matakuliah()
    {
        return $this->belongsTo('\App\Matakuliah', 'kode_matkul', 'kode_matkul');
    }

    public function users()
    {
        return $this->belongsTo('\App\User', 'nidn', 'nidn');
    }
}
