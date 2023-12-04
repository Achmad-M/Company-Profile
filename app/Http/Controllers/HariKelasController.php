<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HariKelas;

class HariKelasController extends Controller
{
    public function index()
    {
        $hari_kelas = HariKelas::all();
        return view('admin-harikelas', compact('hari_kelas'));
    }

    public function store(Request $request)
    {
        $hari_kelas = new HariKelas;
        $hari_kelas->hari = $request->hari;
        $hari_kelas->save();

        return back();
    }

    public function edit(HariKelas $hari_kelas)
    {
        return view('edit-harikelas', compact('hari_kelas'));
    }

    public function update(Request $request, HariKelas $hari_kelas)
    {
        $hari_kelas->hari = $request->hari;
        $hari_kelas->save();

        return redirect('/admin-harikelas');
    }

    public function destroy(HariKelas $hari_kelas)
    {
        $hari_kelas->delete();
        return back();
    }
}
