<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\AlamatPengguna;
use Illuminate\Support\Facades\Log;

class PenggunaController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                // Add validation rules for the AlamatPengguna fields
                'nama_jalan' => 'required|string|max:255',
                'nomor_rumah' => 'required|string|max:255',
                'rt_rumah' => 'required|string|max:255',
                'nama_perumahan' => 'required|string|max:255',
                'kecamatan' => 'required|string|max:255',
                'kelurahan' => 'required|string|max:255',
                'kota' => 'required|string|max:255',
                // Add validation rules for the Pengguna fields
                'nama_lengkap' => 'required|string|max:255',
                'nama_panggilan' => 'required|string|max:255',
                'birthplace' => 'required|string|max:255',
                'birthdate' => 'required|date',
                'foto_diri' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'agama' => 'required|string|max:255',
                'no_hp' => 'required|string|max:255',
                'email' => 'nullable|email|max:255',
                'asal_sekolah' => 'nullable|string|max:255',
                'nama_ayah' => 'required|string|max:255',
                'nama_ibu' => 'required|string|max:255',
                'status_pembayaran' => 'nullable|string|max:255',
            ]);

            // Create a new AlamatPengguna instance and fill it with the validated data
            $alamatPengguna = new AlamatPengguna([
                'nama_jalan' => $request->input('nama_jalan'),
                'nomor_rumah' => $request->input('nomor_rumah'),
                'rt_rumah' => $request->input('rt_rumah'),
                'nama_perumahan' => $request->input('nama_perumahan'),
                'kecamatan' => $request->input('kecamatan'),
                'kelurahan' => $request->input('kelurahan'),
                'kota' => $request->input('kota'),
                // Add more fields as needed
            ]);

            // Save the AlamatPengguna instance to the database
            $alamatPengguna->save();

            // Process the uploaded photo
            $photoPath = null;
            if ($request->hasfile('foto_diri')) {
                $file = $request->file('foto_diri');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = time() . '.' . $extension;
                $file->move('photos', $filename);
                $photoPath = $filename;
            }

            // Create a new Pengguna instance and fill it with the validated data
            $pengguna = new Pengguna([
                'nama_lengkap' => $request->input('nama_lengkap'),
                'nama_panggilan' => $request->input('nama_panggilan'),
                'tmpt_tgl_lahir' => $request->input('birthplace') . ', ' . $request->input('birthdate'),
                'foto_diri' => $photoPath,
                'agama' => $request->input('agama'),
                'no_hp' => $request->input('no_hp'),
                'email' => $request->input('email'),
                'asal_sekolah' => $request->input('asal_sekolah'),
                'nama_ayah' => $request->input('nama_ayah'),
                'nama_ibu' => $request->input('nama_ibu'),
                'status_pembayaran' => $request->input('status_pembayaran'),
                'alamat_pengguna_id' => $alamatPengguna->id,
            ]);

            // Save the Pengguna instance to the database
            $pengguna->save();

            // Redirect to a success page or show a success message
            return redirect()->route('about');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in PenggunaController@store: ' . $e->getMessage());

            // Optionally, you can flash the error message to the session for user feedback
            return redirect()->back()->with('error', 'An error occurred while processing your request. Please try again.');
        }
    }
}
