<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function create() {
        return view('create');
    }

    public function store(Request $request){
        $nama = $request->input('nama');
        $telp = $request->input('telp');
        $tanggal = $request->input('tanggal');
        $deskripsi = $request->input('deskripsi');

        return view('data', compact('nama', 'telp', 'tanggal', 'deskripsi'));

    }

}
