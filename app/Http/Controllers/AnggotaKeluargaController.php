<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\KeluargaKK;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AnggotaKeluargaController extends Controller
{
    public function index()
    {
        try {
            $anggota = AnggotaKeluarga::orderBy('anggota_id', 'desc')->paginate(10);
            return view('admin.anggota_keluarga.index', compact('anggota'));
        } catch (\Exception $e) {
            // Fallback jika ada error
            $anggota = collect();
            return view('admin.anggota_keluarga.index', compact('anggota'));
        }
    }

    public function create(): View
    {
        $warga = Warga::orderBy('nama')->get();
        $kk = KeluargaKK::orderBy('kk_nomor')->get();
        return view('admin.anggota_keluarga.create', compact('warga', 'kk'));
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'kk_id' => ['required', 'integer', 'min:1'],
                'warga_id' => ['required', 'integer', 'min:1'],
                'hubungan' => ['required', 'string', 'max:50'],
            ]);

            AnggotaKeluarga::create($validated);
            return redirect()->route('anggota-keluarga.index')->with('success', 'Data anggota keluarga berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $anggota = AnggotaKeluarga::findOrFail($id);
        return view('admin.anggota_keluarga.show', compact('anggota'));
    }

    public function edit($id)
    {
        $anggota = AnggotaKeluarga::findOrFail($id);
        $warga = Warga::orderBy('nama')->get();
        $keluarga = KeluargaKK::all();
        return view('admin.anggota_keluarga.edit', compact('anggota', 'warga', 'keluarga'));
    }

    public function update(Request $request, AnggotaKeluarga $anggota_keluarga): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'kk_id' => ['required', 'integer', 'min:1'],
                'warga_id' => ['required', 'integer', 'min:1'],
                'hubungan' => ['required', 'string', 'max:50'],
            ]);

            $anggota_keluarga->update($validated);
            return redirect()->route('anggota-keluarga.index')->with('success', 'Data anggota keluarga berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $anggota = AnggotaKeluarga::findOrFail($id);
            $anggota->delete();
            return redirect()->route('anggota-keluarga.index')->with('success', 'Data anggota keluarga berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('anggota-keluarga.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}


