<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailKelas;

class DetailKelasController extends Controller
{
    public function index()
    {
        $detailKelas = DetailKelas::with(['pengajar', 'kelas', 'waktuKelas.hariKelas', 'waktuKelas.sesiKelas'])->get();

        return view('classes', ['detailKelas' => $detailKelas]);
        
    }

    public function home()
    {
        $detailKelas = DetailKelas::with(['pengajar', 'kelas', 'waktuKelas.hariKelas', 'waktuKelas.sesiKelas'])->get();

        return view('index', ['detailKelas' => $detailKelas]);
        
    }
}
