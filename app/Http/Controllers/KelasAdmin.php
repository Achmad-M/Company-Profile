<?php

namespace App\Http\Controllers;

use App\Models\SesiKelas;
use App\Models\HariKelas;
use App\Models\DetailKelas;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasAdmin extends Controller
{
public function index()
{
    $detailkelas = DetailKelas::with('kelas', 'waktuKelas.hariKelas', 'waktuKelas.sesiKelas')->get();
    return view('admin-kelas-index', compact('detailkelas'));
}

}
