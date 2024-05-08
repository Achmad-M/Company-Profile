<?php

// WaktuKelasAdminController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaktuKelas;
use App\Models\HariKelas;
use App\Models\SesiKelas;

class WaktuKelasAdmin extends Controller
{
    public function index()
    {
        $waktu_kelas = WaktuKelas::all();
        $hari_kelas = HariKelas::all(); // Query the HariKelas model
        $sesi_kelas = SesiKelas::all();
        return view('admin-waktukelas', compact('waktu_kelas', 'hari_kelas', 'sesi_kelas')); // Pass the result to your view
    }

    public function store(Request $request)
    {
        $waktu_kelas = new WaktuKelas;
        $waktu_kelas->hari_kelas_id = $request->hari_kelas_id;
        $waktu_kelas->sesi_kelas_id = $request->sesi_kelas_id;
        $waktu_kelas->save();

        return back();
    }

    public function edit(WaktuKelas $waktu_kelas)
    {
        return view('edit-waktukelas', compact('waktu_kelas'));
    }

    public function update(Request $request, WaktuKelas $waktu_kelas)
    {
        $waktu_kelas->hari_kelas_id = $request->hari_kelas_id;
        $waktu_kelas->sesi_kelas_id = $request->sesi_kelas_id;
        $waktu_kelas->save();

        return redirect('/admin-waktukelas');
    }

    public function destroy(WaktuKelas $waktu_kelas)
    {
        $waktu_kelas->delete();
        return back();
    }
}
