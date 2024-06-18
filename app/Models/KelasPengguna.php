<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasPengguna extends Model
{
    use HasFactory;
    protected $fillable = ['penggunas_id', 'kelas_id'];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'penggunas_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}

