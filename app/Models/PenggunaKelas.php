<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaKelas extends Model
{
    use HasFactory;

        protected $table = 'pengguna_kelas';

    protected $fillable = [
        'pengguna_id',
        'detail_kelas_id',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function detailKelas()
    {
        return $this->belongsTo(DetailKelas::class);
    }
}
