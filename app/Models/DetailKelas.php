<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKelas extends Model
{
    use HasFactory;

    protected $table = 'detail_kelas';

    protected $fillable = [
        'pengajar_id',
        'kelas_id',
        'waktu_kelas_id',
        'kapasitas',
        'terisi',
    ];

    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function waktuKelas()
    {
        return $this->belongsTo(WaktuKelas::class);
    }

    public function hariKelas()
    {
        return $this->waktuKelas->hariKelas();
    }

    public function sesiKelas()
    {
        return $this->waktuKelas->sesiKelas();
    }
}
