<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SesiKelas;

class SesiKelasController extends Controller
{
    public function index()
    {
        $sesi_kelas = SesiKelas::all();
        return view('admin-sesikelas', compact('sesi_kelas'));
    }

    public function store(Request $request)
    {
        SesiKelas::create($request->all());
        return back();
    }

    public function edit(SesiKelas $sesi_kelas)
    {
        return view('admin-sesikelas-edit', compact('sesi_kelas'));
    }

    public function update(Request $request, SesiKelas $sesi_kelas)
    {
        $sesi_kelas->update($request->all());
        return redirect('/admin-sesikelas');
    }

    public function destroy(SesiKelas $sesi_kelas)
    {
        $sesi_kelas->delete();
        return back();
    }
}
