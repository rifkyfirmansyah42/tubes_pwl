<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftar;
use App\Models\Pasien;

class DaftarController extends Controller
{
    public function index()
    {
        $daftar = Daftar::with('pasien')->paginate(10);
        return view('daftar_index', compact('daftar'));
    }

    public function create()
    {
        $listPasien = Pasien::all();
        $listPoli = [
            'Poli Umum' => 'Poli Umum',
            'Poli Gigi' => 'Poli Gigi',
            'Poli Anak' => 'Poli Anak',
            // tambahkan poli lainnya
        ];
        return view('daftar_create', compact('listPasien', 'listPoli'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_daftar' => 'required|date',
            'pasien_id' => 'required|exists:pasiens,id',
            'poli' => 'required|string',
            'keluhan' => 'required|string',
        ]);

        Daftar::create($request->all());

        return redirect('/daftar')->with('success', 'Pendaftaran berhasil ditambahkan');
    }

    public function edit($id)
    {
        $daftar = Daftar::findOrFail($id);
        $listPasien = Pasien::all();
        $listPoli = [
            'Poli Umum' => 'Poli Umum',
            'Poli Gigi' => 'Poli Gigi',
            'Poli Anak' => 'Poli Anak',
            // tambahkan poli lainnya
        ];
        return view('daftar_edit', compact('daftar', 'listPasien', 'listPoli'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_daftar' => 'required|date',
            'pasien_id' => 'required|exists:pasiens,id',
            'poli' => 'required|string',
            'keluhan' => 'required|string',
        ]);

        $daftar = Daftar::findOrFail($id);
        $daftar->update($request->all());

        return redirect('/daftar')->with('success', 'Pendaftaran berhasil diperbarui');
    }

    public function destroy($id)
    {
        $daftar = Daftar::findOrFail($id);
        $daftar->delete();

        return redirect('/daftar')->with('success', 'Pendaftaran berhasil dihapus');
    }
}