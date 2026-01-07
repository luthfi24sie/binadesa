<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index(Request $request)
    {
        $query = Warga::query();

        // Search
        if ($request->search) {
            $query->where('nama', 'like', "%".$request->search."%")
                ->orWhere('no_ktp', 'like', "%".$request->search."%");
        }

        // Filter jenis kelamin
        if ($request->jk) {
            $query->where('jenis_kelamin', $request->jk);
        }

        $warga = $query->latest()->paginate(20)->appends($request->all());

        return view('admin.warga.index', compact('warga'));
    }


    public function create()
    {
        return view('admin.warga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp',
            'nama' => 'required|string',
        ]);

        Warga::create($request->all());

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan.');
    }

    public function show($id)
    {
        $warga = Warga::findOrFail($id);
        return view('admin.warga.show', compact('warga'));
    }

    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('admin.warga.edit', compact('warga'));
    }

    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp,' . $id . ',warga_id',
        ]);

        $warga->update($request->all());

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diupdate.');
    }

    public function destroy($id)
    {
        Warga::findOrFail($id)->delete();
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus.');
    }
}
