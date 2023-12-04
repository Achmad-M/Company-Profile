<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class DashboardKelasController extends Controller
{
    //


    public function index()
    {
        $kelas = Kelas::all();
        return view('admin-kelas', compact('kelas'));
    }

    public function store(Request $request)
    {
        $kelas = new Kelas;
        $kelas->nama = $request->nama;
        $kelas->harga = $request->harga;
        $kelas->save();

        return back();
    }

    public function edit(Kelas $kelas)
    {
        return view('edit-kelas', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $kelas->nama = $request->nama;
        $kelas->harga = $request->harga;
        $kelas->save();

        return redirect('/admin-kelas');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return back();
    }
}
