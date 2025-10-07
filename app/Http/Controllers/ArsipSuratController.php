<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArsipSurat;
use App\Models\KategoriSurat;
use Illuminate\Support\Facades\Storage;

class ArsipSuratController extends Controller
{
    public function index(Request $request)
    {
        $query = ArsipSurat::with('kategori');
        $search = $request->input('search');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nomor_surat', 'like', "%{$search}%")
                  ->orWhere('judul', 'like', "%{$search}%");

                $q->orWhereHas('kategori', function ($r) use ($search) {

                    $r->where('nama_kategori', 'like', "%{$search}%");
                });
            });
        }

        $arsip = $query->latest()->get(); 

        return view('arsip.index', compact('arsip'));
    }

    public function show($id)
    {
        $arsip = ArsipSurat::with('kategori')->findOrFail($id);
        return view('arsip.lihat', compact('arsip'));
    }

    public function create()
    {
        $kategori = KategoriSurat::all();
        return view('arsip.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:50',
            'kategori_id' => 'required|integer',
            'judul'       => 'required|string|max:255',
            'file_path'   => 'required|mimes:pdf|max:2048',
        ]);

        // Upload file
        $fileName = time().'_'.$request->file('file_path')->getClientOriginalName();
        $filePath = $request->file('file_path')->storeAs('uploads', $fileName, 'public');

        // Simpan ke DB
        ArsipSurat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul'       => $request->judul,
            'waktu_pengarsipan' => now(),
            'file_path'   => 'storage/'.$filePath,
        ]);

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil ditambahkan');
    }
    
    public function destroy($id)
    {
        $arsip = ArsipSurat::findOrFail($id);


        if ($arsip->file_path && file_exists(public_path($arsip->file_path))) {

            @unlink(public_path($arsip->file_path));
        }

        $arsip->delete();

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil dihapus');
    }


    public function download($id)
    {
        $arsip = ArsipSurat::findOrFail($id);

        if (!$arsip->file_path || !file_exists(public_path($arsip->file_path))) {
            return redirect()->route('arsip.index')->with('error', 'File tidak ditemukan.');
        }

        $filePath = public_path($arsip->file_path);
        $fileName = $arsip->nomor_surat . '-' . \Illuminate\Support\Str::slug($arsip->judul) . '.pdf';

        return response()->download($filePath, $fileName, [
            'Content-Type' => 'application/pdf',
        ]);
    }


    public function update(Request $request, $id)
    {
        $arsip = ArsipSurat::findOrFail($id);

        $request->validate([
            'judul' => 'sometimes|required|string|max:255',
            'kategori_id' => 'sometimes|required|exists:kategori_surat,id',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($request->filled('judul')) {
            $arsip->judul = $request->judul;
        }
        if ($request->filled('kategori_id')) {
            $arsip->kategori_id = $request->kategori_id;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();

            $storedPath = $file->storeAs('uploads', $fileName, 'public'); 
            $newPublicPath = 'storage/' . $storedPath; 

            if ($arsip->file_path && file_exists(public_path($arsip->file_path))) {
                @unlink(public_path($arsip->file_path));
            }

            $arsip->file_path = $newPublicPath;
        }

        $arsip->save();

        return redirect()->route('arsip.lihat', $arsip->id)->with('success', 'Arsip berhasil diperbarui.');
    }
}
