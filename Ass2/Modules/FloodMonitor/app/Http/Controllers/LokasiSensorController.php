<?php

namespace Modules\FloodMonitor\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\FloodMonitor\Models\LokasiSensor;

class LokasiSensorController extends Controller
{
    public function index()
    {
        return view('floodmonitor::index');
    }

    public function getData()
    {
        $lokasis = LokasiSensor::latest()->get();
        return response()->json($lokasis);
    }

    public function create()
    {
        return view('floodmonitor::index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lokasi' => 'required',
            'kecamatan' => 'required',
            'deskripsi' => 'nullable',
        ]);

        LokasiSensor::create($data);

        return redirect()->route('floodmonitor.index')->with('success', 'Lokasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $lokasi_sensor = LokasiSensor::find($id);
        return response()->json($lokasi_sensor);
    }

    public function update(Request $request, LokasiSensor $lokasi_sensor)
    {
        $data = $request->validate([
            'nama_lokasi' => 'required',
            'kecamatan' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $lokasi_sensor->update($data);

        return redirect()->route('floodmonitor.index')->with('success', 'Lokasi berhasil diperbarui.');
    }

    public function destroy(LokasiSensor $lokasi_sensor)
    {
        $lokasi_sensor->delete();
        return redirect()->route('floodmonitor.index')->with('success', 'Lokasi berhasil dihapus.');
    }
}
