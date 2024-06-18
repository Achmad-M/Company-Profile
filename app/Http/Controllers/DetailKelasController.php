<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailKelas;
use App\Models\PenggunaKelas; // Pastikan Anda memiliki model ini

class DetailKelasController extends Controller
{
    public function index()
    {
        $this->updateTerisi();
        $detailKelas = DetailKelas::with(['pengajar', 'kelas', 'waktuKelas.hariKelas', 'waktuKelas.sesiKelas'])->get();

        return view('classes', ['detailKelas' => $detailKelas]);
    }

    public function home()
    {
        $this->updateTerisi();
        $detailKelas = DetailKelas::with(['pengajar', 'kelas', 'waktuKelas.hariKelas', 'waktuKelas.sesiKelas'])->get();

        return view('index', ['detailKelas' => $detailKelas]);
    }

    public function updateTerisi()
    {
        $detailKelas = DetailKelas::all();
        foreach ($detailKelas as $kelas) {
            $jumlahPengguna = PenggunaKelas::where('detail_kelas_id', $kelas->id)->count();
            $kelas->terisi = $jumlahPengguna;
            $kelas->save();
        }
    }
}
