<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaAdmin extends Controller
{

    public function index()
    {
        $penggunas = Pengguna::with('penggunaKelas.detailKelas.waktuKelas.hariKelas', 'penggunaKelas.detailKelas.waktuKelas.sesiKelas')->get();
        return view('admin-pengguna-index', compact('penggunas'));
    }


    public function update(Request $request, $id)
    {
        $pengguna = Pengguna::find($id);
        if ($pengguna != null) {
            $pengguna->nama_lengkap = $request->nama_lengkap;
            $pengguna->jenis_kelamin = $request->jenis_kelamin;
            $pengguna->tingkat_sekolah = $request->tingkat_sekolah;
            $pengguna->no_hp = $request->no_hp;
            $pengguna->status_pembayaran = $request->status_pembayaran;
            // tambahkan field lainnya sesuai dengan form input
            $pengguna->save();
            return redirect('/admin-pengguna-index')->with('success', 'Data pengguna berhasil diperbarui');
        } else {
            return redirect('/')->with('error', 'Data pengguna tidak ditemukan');
        }
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::find($id);
        // Handle photo deletion if a photo exists
        if ($pengguna->foto_diri) {
            $photoPath = public_path('photos/' . $pengguna->foto_diri);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }
        $pengguna = Pengguna::find($id);
        // Handle photo deletion if a photo exists
        if ($pengguna->bukti_pembayaran) {
            $photoPath = public_path('payment_proofs/' . $pengguna->bukti_pembayaran);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }
        $pengguna = Pengguna::find($id);
        if ($pengguna != null) {
            $pengguna->delete();
            return redirect('/admin-pengguna-index')->with('success', 'Data pengguna berhasil dihapus');
        } else {
            return redirect('/')->with('error', 'Data pengguna tidak ditemukan');
        }
    }
}
