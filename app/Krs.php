<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'krs';
    protected $fillable = ['nim', 'kode_matkul'];

    public function mahasiswas(){
        return $this->belongsTo(krs::class, 'nim', 'nim');
    }

    public function matakuliahs(){
        return $this->belongsTo(Matakuliah::class, 'kode_matkul', 'kode_matkul');
    }
}
