<?php

// app/Models/Kelas.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Kelas extends Model
{
    use HasFactory;
    protected $fillable = ['waktu_kelas_id', 'pengajar_kelas_id', 'nama', 'kapasitas', 'terisi'];

    public function waktuKelas()
    {
        return $this->belongsTo(WaktuKelas::class, 'waktu_kelas_id');
    }

    // Mungkin perlu ada relasi lain yang perlu ditambahkan
}

