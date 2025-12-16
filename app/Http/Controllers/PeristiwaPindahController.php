<?php

namespace App\Http\Controllers;

use App\Models\PeristiwaPindah;
use App\Models\Warga;
use Illuminate\Http\Request;

class PeristiwaPindahController extends Controller
{
    public function index()
    {
        $pindah = PeristiwaPindah::with('warga')->paginate(20);
        return view('admin.peristiwa_pindah.index', compact('pindah'));
    }


    public function create()
    {
        $warga = Warga::orderBy('nama')->get();
        return view('admin.peristiwa_pindah.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id' => 'required',
            'tgl_pindah' => 'required',
        ]);

        PeristiwaPindah::create($request->all());

        return redirect()->route('peristiwa_pindah.index')->with('success', 'Data pindah dicatat.');
    }

    public function show($id)
    {
        $data = PeristiwaPindah::with('warga', 'media')->findOrFail($id);
        return view('admin.peristiwa_pindah.show', compact('data'));
    }

    public function edit($id)
    {
        $pindah = PeristiwaPindah::findOrFail($id);
        $warga = Warga::orderBy('nama')->get();
        return view('admin.peristiwa_pindah.edit', compact('pindah', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'warga_id' => 'required',
            'tgl_pindah' => 'required',
        ]);

        $pindah = PeristiwaPindah::findOrFail($id);
        $pindah->update($request->all());

        return redirect()->route('peristiwa_pindah.index')->with('success', 'Data pindah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        PeristiwaPindah::findOrFail($id)->delete();
        return back()->with('success', 'Data pindah dihapus.');
    }
}
