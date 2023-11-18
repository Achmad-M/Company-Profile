<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    use HasFactory;

    protected $table = 'pengajars';

    protected $fillable = [
        'alamat_pengajar_id',
        'nama',
        'jenis_kelamin',
        'tmpt_tgl_lahir',
        'agama',
        'foto_diri',
        'email',
        'no_hp',
    ];

    protected $casts = [
        'foto_diri' => 'array',
    ];
}