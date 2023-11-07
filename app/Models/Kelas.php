<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'pengajar',
        'hari',
        'sesi',
        'kapasitas',
        'terisi',
        'created_at',
        'updated_at',
        'admin_id',
    ];
    use HasFactory;
}
