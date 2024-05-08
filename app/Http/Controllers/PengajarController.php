<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajar;
use App\Models\AlamatPengajar;
use Illuminate\Support\Facades\Log; // Tambahkan baris ini

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
        try {
            // Validasi data masukan
            // Proses pengunggahan foto
            // var_dump($request->hasFile('foto_diri'));
            // var_dump($request->file('foto_diri'));
            // var_dump($request->all());

            $photoPath = null;
            if ($request->hasfile('foto_diri')) {
                $file = $request->file('foto_diri');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = time() . '.' . $extension;
                $file->move('photos_pengajar', $filename);
                $photoPath = $filename;
            }
            // var_dump($request->file('foto_diri'));
            // var_dump($photoPath);
            // dd(($request->all()));

            // Buat log untuk menampilkan isi dari $photoPath
            error_log('Isi dari photoPath: ' . $photoPath);

            // Buat instance Pengajar baru dan isi dengan data yang telah divalidasi
            $pengajar = new Pengajar([
                'nama' => $request->input('nama'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'tmpt_tgl_lahir' => $request->input('tmpt_tgl_lahir'),
                'agama' => $request->input('agama'),
                'foto_diri' => $photoPath, // Gunakan nama file yang disimpan di $photoPath
                'email' => $request->input('email'),
                'no_hp' => $request->input('no_hp'),
                'alamat_pengajar_id' => $request->input('alamat_pengajar_id'),
            ]);
            // Simpan instance Pengajar ke dalam database
            $pengajar->save();

            // Add debugging statement
            Log::info('All Request Data: ' . json_encode($request->all()));

            // Redirect ke halaman sukses dengan pesan sukses
            return redirect()->route('admin-pengajar')->with('success', 'Profile pengajar berhasil ditambahkan.');
        } catch (\Exception $e) {

            // Redirect kembali dengan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses permintaan Anda. Silakan coba lagi.');
        }
    }

    public function edit(Pengajar $pengajar)
    {
        $alamatPengajars = AlamatPengajar::all();
        return view('edit-pengajar', compact('pengajar', 'alamatPengajars'));
    }

    public function update(Request $request, Pengajar $pengajar)
    {
        // Handle file upload for 'foto_diri' if a file was uploaded
        if ($request->hasFile('foto_diri')) {
            // Hapus foto lama jika ada
            if ($pengajar->foto_diri) {
                $oldPhotoPath = public_path('photos_pengajar/' . $pengajar->foto_diri);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            $file = $request->file('foto_diri');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('photos_pengajar', $filename);
            $pengajar->foto_diri = $filename; // Use the new file name in the database
        }

        // Update other pengajar data
        $pengajar->nama = $request->nama;
        $pengajar->jenis_kelamin = $request->jenis_kelamin;
        $pengajar->tmpt_tgl_lahir = $request->tmpt_tgl_lahir;
        $pengajar->agama = $request->agama;
        $pengajar->email = $request->email;
        $pengajar->no_hp = $request->no_hp;
        $pengajar->alamat_pengajar_id = $request->alamat_pengajar_id;

        // Save the updated pengajar instance
        $pengajar->save();

        return redirect('/admin-pengajar');
    }



    public function destroy_pengajar(Request $request, Pengajar $pengajar)
    {
        // Handle photo deletion if a photo exists
        if ($pengajar->foto_diri) {
            $photoPath = public_path('photos_pengajar/' . $pengajar->foto_diri);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        // Delete the pengajar data
        $pengajar->delete();

        return back();
    }


    public function destroy_alamat_pengajar(Request $request, AlamatPengajar $alamatPengajar)
    {
        try {
            // Simpan data alamat pengajar sebelum dihapus untuk log
            $dataPengajar = $alamatPengajar->toArray();

            // Hapus data alamat pengajar
            $alamatPengajar->delete();

            // Log keberhasilan dengan ID dan data alamat pengajar
            Log::info('Alamat pengajar berhasil dihapus: ', $dataPengajar);

            return back()->with('success', 'Alamat pengajar berhasil dihapus.');
        } catch (\Exception $e) {
            // Log kegagalan dengan pesan error
            Log::error('Gagal menghapus alamat pengajar: ' . $e->getMessage());

            return back()->with('error', 'Gagal menghapus alamat pengajar: ' . $e->getMessage());
        }
    }
}
