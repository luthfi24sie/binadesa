<?php

namespace App\Http\Controllers;

use App\Models\Keluarga_kk;
use Illuminate\Http\Request;

class KeluargaKKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataKeluarga_kk'] = Keluarga_kk::all();

        return view('admin.keluarga_kk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.keluarga_kk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['kk_nomor'] = $request->kk_nomor;
        $data['kepala_keluarga_warga_id'] = $request->kepala_keluarga_warga_id;
        $data['alamat'] = $request->alamat;
        $data['rt'] = $request->rt;
        $data['rw'] = $request->rw;

        Keluarga_kk::create($data);

        return redirect()->route('keluarga_kk.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataKeluarga_kk'] = Keluarga_kk::findOrFail($id);

        return view('admin.keluarga_kk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $keluarga = Keluarga_kk::findOrFail($id);

        $keluarga->kk_nomor = $request->kk_nomor;
        $keluarga->kepala_keluarga_warga_id = $request->kepala_keluarga_warga_id;
        $keluarga->alamat = $request->alamat;
        $keluarga->rt = $request->rt;
        $keluarga->rw = $request->rw;

        $keluarga->save();

        return redirect()->route('keluarga_kk.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $keluarga = Keluarga_kk::findOrFail($id);
        $keluarga->delete();

        return redirect()->route('keluarga_kk.index')->with('success', 'Data berhasil dihapus');

    }
}
