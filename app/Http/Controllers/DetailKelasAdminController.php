<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailKelas;
use App\Models\Pengajar;
use App\Models\Kelas;
use App\Models\WaktuKelas;

class DetailKelasAdminController extends Controller
{
    public function index()
    {
        $detail_kelas = DetailKelas::with('pengajar', 'kelas', 'waktuKelas')->get();
        $pengajars = Pengajar::all();
        $kelases = Kelas::all();
        $waktu_kelases = WaktuKelas::all();
        return view('admin-detailkelas', compact('detail_kelas', 'pengajars', 'kelases', 'waktu_kelases'));
    }

    public function store(Request $request)
    {
        $detail_kelas = new DetailKelas;
        $detail_kelas->pengajar_id = $request->pengajar_id;
        $detail_kelas->kelas_id = $request->kelas_id;
        $detail_kelas->waktu_kelas_id = $request->waktu_kelas_id;
        $detail_kelas->kapasitas = $request->kapasitas;
        $detail_kelas->save();

        return back();
    }

    public function edit(DetailKelas $detail_kelas)
    {
        $pengajars = Pengajar::all();
        $kelases = Kelas::all();
        $waktu_kelases = WaktuKelas::all();
        return view('edit-detailkelas', compact('detail_kelas', 'pengajars', 'kelases', 'waktu_kelases'));
    }

    public function update(Request $request, DetailKelas $detail_kelas)
    {
        $detail_kelas->pengajar_id = $request->pengajar_id;
        $detail_kelas->kelas_id = $request->kelas_id;
        $detail_kelas->waktu_kelas_id = $request->waktu_kelas_id;
        $detail_kelas->kapasitas = $request->kapasitas;
        $detail_kelas->save();

        return redirect('/admin-detailkelas');
    }

    public function destroy(DetailKelas $detail_kelas)
    {
        $detail_kelas->delete();
        return back();
    }
}
