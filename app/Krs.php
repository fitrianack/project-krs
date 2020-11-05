<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'krs';
    protected $fillable = ['nim', 'kode_matkul'];
}
