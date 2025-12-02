<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnggotaKeluargaController extends Controller
{
    public function index(): View
    {
        try {
            $anggota = AnggotaKeluarga::orderBy('anggota_id', 'desc')->paginate(10);

            return view('anggota_keluarga.index', compact('anggota'));
        } catch (\Exception $e) {
            // Fallback jika ada error
            $anggota = collect();

            return view('anggota_keluarga.index', compact('anggota'));
        }
    }

    public function create(): View
    {
        return view('anggota_keluarga.create');
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
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: '.$e->getMessage());
        }
    }

    public function show(AnggotaKeluarga $anggota_keluarga): View
    {
        try {
            return view('anggota_keluarga.show', ['item' => $anggota_keluarga]);
        } catch (\Exception $e) {
            return redirect()->route('anggota-keluarga.index')->with('error', 'Data tidak ditemukan');
        }
    }

    public function edit(AnggotaKeluarga $anggota_keluarga): View
    {
        try {
            return view('anggota_keluarga.edit', ['item' => $anggota_keluarga]);
        } catch (\Exception $e) {
            return redirect()->route('anggota-keluarga.index')->with('error', 'Data tidak ditemukan');
        }
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
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: '.$e->getMessage());
        }
    }

    public function destroy(AnggotaKeluarga $anggota_keluarga): RedirectResponse
    {
        try {
            $anggota_keluarga->delete();

            return redirect()->route('anggota-keluarga.index')->with('success', 'Data anggota keluarga berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('anggota-keluarga.index')->with('error', 'Terjadi kesalahan: '.$e->getMessage());
        }
    }
}
