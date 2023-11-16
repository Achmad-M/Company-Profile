<?php

// app/Models/WaktuKelas.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaktuKelas extends Model
{
    use HasFactory;

    public function hariKelas()
    {
        return $this->belongsTo(HariKelas::class);
    }

    public function sesiKelas()
    {
        return $this->belongsTo(SesiKelas::class);
    }
}


