<?php

namespace App\Http\Controllers;

use App\Models\KeluargaKK;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AnggotaKeluargaController extends Controller
{
  public function index(Request $request)
    {
        $data = KeluargaKK::with('kepalaKeluarga')->paginate(20);
        return view('admin.kk.index', compact('data'));
    }


    public function create(): View
    {
        $kk = Keluarga_kk::orderBy('kk_nomor')->get();
        $warga = Warga::orderBy('nama')->get();
        return view('admin.kk.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kk_nomor' => 'required|unique:keluarga_kk,kk_nomor',
            'kepala_keluarga_warga_id' => 'required',
        ]);

        KeluargaKK::create($request->all());

        return redirect()->route('kk.index')->with('success', 'KK Berhasil dibuat.');
    }

    public function show($id)
    {
        $kk = KeluargaKK::with('kepalaKeluarga', 'anggota.warga')->findOrFail($id);
        return view('admin.kk.show', compact('kk'));
    }

    public function edit($id)
    {
        $kk = KeluargaKK::findOrFail($id);
        $warga = Warga::orderBy('nama')->get();
        return view('admin.kk.edit', compact('kk', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $kk = KeluargaKK::findOrFail($id);

        $request->validate([
            'kk_nomor' => 'required|unique:keluarga_kk,kk_nomor,' . $id . ',kk_id',
        ]);

        $kk->update($request->all());

        return redirect()->route('kk.index')->with('success', 'KK berhasil diupdate.');
    }


    public function destroy($id)
    {
        KeluargaKK::findOrFail($id)->delete();
        return redirect()->route('kk.index')->with('success', 'KK berhasil dihapus.');
    }
}
