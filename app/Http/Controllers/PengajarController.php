<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajar;
use App\Models\AlamatPengajar;

class PengajarController extends Controller
{
    public function index()
    {
        $pengajars = Pengajar::all();
        $alamatPengajars = AlamatPengajar::all();
        return view('admin-pengajar', compact('pengajars', 'alamatPengajars'));
    }

    public function store(Request $request)
    {
        // Simpan data pengajar
        $pengajar = new Pengajar;
        $pengajar->nama = $request->nama;
        $pengajar->jenis_kelamin = $request->jenis_kelamin;
        $pengajar->tmpt_tgl_lahir = $request->tmpt_tgl_lahir;
        $pengajar->agama = $request->agama;
        // $pengajar->foto_diri = $request->foto_diri; // Anda mungkin perlu menangani unggahan file di sini
        $pengajar->email = $request->email;
        $pengajar->no_hp = $request->no_hp;
        $pengajar->save();

        // Simpan data alamat pengajar
        $alamatPengajar = new AlamatPengajar;
        $alamatPengajar->nama_jalan = $request->nama_jalan;
        $alamatPengajar->nomor_rumah = $request->nomor_rumah;
        $alamatPengajar->rt_rumah = $request->rt_rumah;
        $alamatPengajar->nama_perumahan = $request->nama_perumahan;
        $alamatPengajar->kecamatan = $request->kecamatan;
        $alamatPengajar->kelurahan = $request->kelurahan;
        $alamatPengajar->kota = $request->kota;
        $alamatPengajar->save();

        return back();
    }

    public function edit(Pengajar $pengajar)
    {
        $alamatPengajars = AlamatPengajar::all();
        return view('edit-pengajar', compact('pengajar', 'alamatPengajars'));
    }

    public function update(Request $request, Pengajar $pengajar)
    {
        // Update data pengajar
        $pengajar->nama = $request->nama;
        $pengajar->jenis_kelamin = $request->jenis_kelamin;
        $pengajar->tmpt_tgl_lahir = $request->tmpt_tgl_lahir;
        $pengajar->agama = $request->agama;
        // $pengajar->foto_diri = $request->foto_diri; // Anda mungkin perlu menangani unggahan file di sini
        $pengajar->email = $request->email;
        $pengajar->no_hp = $request->no_hp;
        $pengajar->save();


        return redirect('/admin-pengajar');
    }

    public function destroy(Request $request, Pengajar $pengajar)
    {
        // Hapus data pengajar
        $pengajar->delete();
    

        return back();
    }
}
