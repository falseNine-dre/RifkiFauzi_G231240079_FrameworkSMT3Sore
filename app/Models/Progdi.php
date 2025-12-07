<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progdi extends Model
{
    use HasFactory;

    protected $table = 'progdis';            // pastikan nama tabel jamak (sesuai database)
    protected $primaryKey = 'id_progdi';     // ganti primary key
    public $incrementing = true;             // karena tipe data integer auto increment
    protected $keyType = 'int';              // tipe primary key

    protected $fillable = [
        'nm_fakultas',
        'nm_progdi'
    ];
}
