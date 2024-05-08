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
        $photoPath = null;
        if ($request->hasfile('gambar_kelas')) {
            $file = $request->file('gambar_kelas');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('photos_kelas', $filename);
            $photoPath = $filename;
        }

        $kelas = new Kelas;
        $kelas->nama = $request->nama;
        $kelas->gambar_kelas = $photoPath;
        $kelas->harga = $request->harga;
        $kelas->biaya_pendaftaran = $request->biaya_pendaftaran;
        $kelas->save();

        return back();
    }

    public function edit(Kelas $kelas)
    {
        return view('edit-kelas', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        // Handle file upload for 'gambar_kelas' if a file was uploaded
        if ($request->hasFile('gambar_kelas')) {
            // Hapus foto lama jika ada
            if ($kelas->gambar_kelas) {
                $oldPhotoPath = public_path('photos_kelas/' . $kelas->gambar_kelas);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            $file = $request->file('gambar_kelas');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('photos_kelas', $filename);
            $kelas->gambar_kelas = $filename; // Use the new file name in the database
        }
        $kelas->nama = $request->nama;
        $kelas->harga = $request->harga;
        $kelas->biaya_pendaftaran = $request->biaya_pendaftaran;
        $kelas->save();

        return redirect('/admin-kelas');
    }

    public function destroy(Kelas $kelas)
    {
        // Hapus foto jika ada
        if ($kelas->gambar_kelas) {
            $photoPath = public_path('photos_kelas/' . $kelas->gambar_kelas);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        $kelas->delete();
        return back();
    }
}
