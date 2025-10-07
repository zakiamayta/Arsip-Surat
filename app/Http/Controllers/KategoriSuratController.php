<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriSurat;

class KategoriSuratController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategori = KategoriSurat::when($search, function($query, $search) {
            return $query->where('nama_kategori', 'like', "%{$search}%")
                         ->orWhere('keterangan', 'like', "%{$search}%");
        })->get();

        return view('kategori.index', compact('kategori', 'search'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        KategoriSurat::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = KategoriSurat::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        $kategori = KategoriSurat::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = KategoriSurat::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}

