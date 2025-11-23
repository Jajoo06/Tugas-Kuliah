<?php

namespace Modules\Pendaftaran\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// PERBAIKAN 1: Ubah 'Daftar' menjadi 'DaftarPendaftaran' sesuai nama file Model Anda
use Modules\Pendaftaran\Models\DaftarPendaftaran;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('pendaftaran::index');
    }

    public function getData()
    {
        // PERBAIKAN 2: Panggil DaftarPendaftaran
        $pendaftarans = DaftarPendaftaran::latest()->get();
        return response()->json($pendaftarans);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'asal_sekolah' => 'required',
            'prodi_tujuan' => 'required',
        ]);

        // PERBAIKAN 3: Panggil DaftarPendaftaran
        DaftarPendaftaran::updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );

        return response()->json(['success' => 'Data berhasil disimpan.']);
    }

    public function edit($id)
    {
        // PERBAIKAN 4: Panggil DaftarPendaftaran
        $pendaftaran = DaftarPendaftaran::find($id);
        return response()->json($pendaftaran);
    }

    public function destroy($id)
    {
        // PERBAIKAN 5: Panggil DaftarPendaftaran
        DaftarPendaftaran::find($id)->delete();
        return response()->json(['success' => 'Data berhasil dihapus.']);
    }
}