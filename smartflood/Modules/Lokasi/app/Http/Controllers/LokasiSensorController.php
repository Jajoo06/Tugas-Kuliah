<?php

namespace Modules\Lokasi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Lokasi\Models\LokasiSensor;

class LokasiSensorController extends Controller
{
    public function index()
    {
        $lokasi = LokasiSensor::all();
        return view('lokasi::index', compact('lokasi'));
    }

    public function getData()
    {
        return response()->json([
            'data' => LokasiSensor::all()
        ]);
    }
}
