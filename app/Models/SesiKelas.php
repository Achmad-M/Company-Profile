<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesiKelas extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'pukul'];
}
