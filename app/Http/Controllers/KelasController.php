<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Pengajar;
use App\Models\WaktuKelas;

class KelasController extends Controller
{
    public function tampilkanKelas()
    {
        // Ambil semua data kelas
        $classDetails = Kelas::all();

        // Kirim data ke view
        return view('classes', compact('classDetails'));
    }

    // Jika Anda ingin menambahkan fungsi lain, seperti menampilkan detail kelas, tambahkan fungsi berikut:
    public function tampilkanDetailKelas($id)
    {
        // Ambil data kelas berdasarkan ID
        $kelas = Kelas::find($id);

        // Ambil nama pengajar berdasarkan teacher_id
        $pengajar = Pengajar::find($kelas->id_pengajar);

        // Ambil informasi waktu kelas
        $waktuKelas = WaktuKelas::find($kelas->waktu_kelas_id);
        $hariKelas = $waktuKelas->hari_kelas;
        $sesiKelas = $waktuKelas->sesi_kelas;

        // Kirim data ke view detail kelas
        return view('classes', compact('kelas', 'pengajar', 'hariKelas', 'sesiKelas'));
    }
}
