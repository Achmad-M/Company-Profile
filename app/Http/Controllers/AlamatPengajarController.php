<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajar;
use App\Models\AlamatPengajar;
use Illuminate\Support\Facades\Log; // Tambahkan baris ini

class AlamatPengajarController extends Controller
{
    public function index()
    {
        $pengajars = Pengajar::all();
        $alamatPengajars = AlamatPengajar::all();
        return view('admin-pengajar', compact('pengajars', 'alamatPengajars'));
    }

    public function storealamat(Request $request)
    {
        try {
            // Create a new AlamatPengajar instance and fill it with the validated data
            $alamatPengajar = new AlamatPengajar([
                'nama_jalan' => $request->input('nama_jalan'),
                'nomor_rumah' => $request->input('nomor_rumah'),
                'rt_rumah' => $request->input('rt_rumah'),
                'nama_perumahan' => $request->input('nama_perumahan'),
                'kecamatan' => $request->input('kecamatan'),
                'kelurahan' => $request->input('kelurahan'),
                'kota' => $request->input('kota'),
                // Add more fields as needed
            ]);

            // Simpan instance Pengajar ke dalam database
            $alamatPengajar->save();

            // Redirect ke halaman sukses dengan pesan sukses
            return redirect()->route('admin-pengajar.index')->with('success', 'Profile pengajar berhasil ditambahkan.');
        } catch (\Exception $e) {

            // Redirect kembali dengan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses permintaan Anda. Silakan coba lagi.');
        }
    }
}
