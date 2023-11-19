<?php

// app/Models/Admin.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Admin extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;
    protected $fillable = ['nama', 'password', 'no_hp', 'email'];

    // Tidak ada relasi pada contoh ini
}

