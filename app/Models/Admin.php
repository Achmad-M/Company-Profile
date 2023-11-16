<?php

// app/Models/Admin.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'password', 'no_hp', 'email'];

    // Tidak ada relasi pada contoh ini
}

