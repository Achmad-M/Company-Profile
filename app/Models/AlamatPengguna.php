<?php

// app/Models/AlamatPengguna.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatPengguna extends Model
{
    use HasFactory;
    protected $fillable = ['nama_jalan', 'nomor_rumah', 'rt_rumah', 'nama_perumahan', 'kecamatan', 'kelurahan', 'kota'];

    // Definisikan relasi jika diperlukan
}

