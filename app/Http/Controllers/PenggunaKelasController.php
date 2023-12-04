<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenggunaKelas;
use App\Models\Pengguna;
use App\Models\DetailKelas;

class PenggunaKelasController extends Controller
{
    public function index()
    {
        $pengguna_kelas = PenggunaKelas::with('pengguna', 'detailKelas')->get();
        $penggunas = Pengguna::all();
        $detail_kelas = DetailKelas::all();
        return view('admin-penggunakelas', compact('pengguna_kelas', 'penggunas', 'detail_kelas'));
    }

    public function store(Request $request)
    {
        $pengguna_kelas = new PenggunaKelas;
        $pengguna_kelas->pengguna_id = $request->pengguna_id;
        $pengguna_kelas->detail_kelas_id = $request->detail_kelas_id;
        $pengguna_kelas->save();

        return back();
    }

    public function edit(PenggunaKelas $pengguna_kelas)
    {
        $penggunas = Pengguna::all();
        $detail_kelas = DetailKelas::all();
        return view('edit-penggunakelas', compact('pengguna_kelas', 'penggunas', 'detail_kelas'));
    }

    public function update(Request $request, PenggunaKelas $pengguna_kelas)
    {
        $pengguna_kelas->pengguna_id = $request->pengguna_id;
        $pengguna_kelas->detail_kelas_id = $request->detail_kelas_id;
        $pengguna_kelas->save();

        return redirect('/admin-penggunakelas');
    }

    public function destroy(PenggunaKelas $pengguna_kelas)
    {
        $pengguna_kelas->delete();
        return back();
    }
}
