<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    public function tambahAbsensi(Request $request)
    {
        $request->validate([
            'lokasi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'pesan' => 'required',
            'tipe_absen' => 'required',
        ]);

        $nama_karyawan = auth()->user()->name;
        $lokasi = $request->lokasi;
        $gambar = $request->file('gambar');
        $pesan = $request->pesan;
        $tipe = $request->tipe_absen;
        $waktu = now();
        $terlambat = 2;

        // Logika jam absen
        $jam = $waktu->format('H:i:s');
        $jam_absen_pagi = "08:00:00";
        $jam_absen_sore = "15:00:00";

        if ($tipe == 2 && $jam < $jam_absen_sore) {
            return redirect()->route('index')->with('error', 'Absen pulang jam 3 sore ya.');
        }

        if ($tipe == 2 && $jam > $jam_absen_sore) {
            $terlambat = 3;
        } elseif ($jam > $jam_absen_pagi) {
            $terlambat = 1;
        }

        // Upload gambar
        $nama_gambar_baru = $gambar->getClientOriginalName();
        $gambar->storeAs('uploaded_img', $nama_gambar_baru, 'public');

        try {
            // Simpan ke database
            $absensi = new Absensi([
                'nama_karyawan' => $nama_karyawan,
                'waktu' => $waktu,
                'lokasi' => $lokasi,
                'pesan' => $pesan,
                'gambar' => $nama_gambar_baru,
                'tipe_absen' => $tipe,
                'hadir' => $terlambat,
            ]);

            $absensi->save();

            return redirect()->route('index')->with('success', 'Absen berhasil.');
        } catch (\Exception $e) {
            // Gagal menyimpan ke database
            return redirect()->route('index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
