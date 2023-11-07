<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'created_at',
        'updated_at',
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'admin_id');
    }

    public function pengguna()
    {
        return $this->hasMany(Pengguna::class, 'admin_id');
    }

    use HasFactory;
}
