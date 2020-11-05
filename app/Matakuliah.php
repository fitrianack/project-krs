<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $primaryKey = 'kode_matkul';
    protected $table = "matakuliahs";
    protected $fillable = ['nama_matkul', 'sks'];
}
