<?php


namespace Modules\Laporan\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Lokasi\Models\LokasiSensor;
use Modules\Laporan\Models\Laporan;

class LaporanController extends Controller
{
    public function index()
    {
        $lokasi = LokasiSensor::all();
        return view('laporan::index', compact('lokasi'));
    }


    public function getData()
    {
        if (auth()->user()->role === 'admin') {
            $data = Laporan::latest()->get();
        } else {
            $data = Laporan::where('user_id', auth()->id())->latest()->get();
        }

        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lokasi_sensor_id' => 'required',
            'ketinggian_air' => 'required|numeric',
            'deskripsi' => 'required',
            'foto_bukti' => 'nullable|mimes:jpg,png,pdf|max:2048'
        ]);

        // Tentukan status risiko (sederhana)
        $status = $request->ketinggian_air < 50 ? 'Aman'
                 : ($request->ketinggian_air < 100 ? 'Siaga' : 'Bahaya');

        $filePath = null;
        if ($request->hasFile('foto_bukti')) {
            $filePath = $request->file('foto_bukti')->store('bukti', 'public');
        }

        Laporan::create([
            'user_id' => auth()->id(),
            'lokasi_sensor_id' => $request->lokasi_sensor_id,
            'ketinggian_air' => $request->ketinggian_air,
            'status_risiko' => $status,
            'deskripsi' => $request->deskripsi,
            'foto_bukti' => $filePath
        ]);

        return response()->json(['message' => 'Laporan berhasil dikirim']);
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);

        if (auth()->user()->role !== 'admin' && $laporan->user_id !== auth()->id()) {
            abort(403);
        }

        $laporan->delete();
        return response()->json(['message' => 'Laporan berhasil dihapus']);
    }
}
