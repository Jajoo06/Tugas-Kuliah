<?php

namespace App\Http\Controllers;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        // Simpan file
        $path = $request->file('file')->store('uploads', 'public');

        // Simpan database
        Upload::create([
            'file_name' => $request->file('file')->getClientOriginalName(),
            'file_path' => $path,
            'user_id' => auth()->id(), // hubungkan ke user login
        ]);

        return back()->with('success', 'File berhasil diupload!');
    }

    public function destroy(Upload $upload)
    {
        // Hanya pemilik file atau admin yang boleh hapus
        if ($upload->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Anda tidak berhak menghapus file ini.');
        }

        Storage::delete('public/' . $upload->file_path);
        $upload->delete();

        return back()->with('success', 'File berhasil dihapus!');
    }
}
