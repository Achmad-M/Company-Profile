<?php

// app/Models/AlamatPengajar.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlamatPengajar extends Model
{
    use HasFactory;
    protected $fillable = ['nama_jalan', 'nomor_rumah', 'rt_rumah', 'nama_perumahan', 'kecamatan', 'kelurahan', 'kota'];

    // Definisikan relasi jika diperlukan
}

