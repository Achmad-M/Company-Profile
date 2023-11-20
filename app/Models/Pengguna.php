<?php

// app/Models/Pengguna.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'penggunas';
    protected $fillable = ['alamat_pengguna_id', 'nama_lengkap', 'nama_panggilan', 'jenis_kelamin', 'tmpt_tgl_lahir', 'foto_diri', 'agama', 'no_hp', 'email','tingkat_sekolah', 'asal_sekolah', 'nama_ayah', 'nama_ibu','bukti_pembayaran', 'status_pembayaran'];

    public function alamatPengguna()
    {
        return $this->belongsTo(AlamatPengguna::class, 'alamat_pengguna_id');
    }

        public function penggunaKelas()
    {
        return $this->hasMany(PenggunaKelas::class, 'pengguna_id');
    }
    // Mungkin ada relasi lain yang perlu ditambahkan
}
