<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('absensis.index', [
            'absensis' => Absensi::all(),
            'pegawai' => Pegawai::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('absensis.create', [
            'pegawai' => Pegawai::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nip' => 'required',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required'
        ]);

        $absensi = new Absensi();
        $absensi->nip = $validateData['nip'];
        $absensi->jam_masuk = $validateData['jam_masuk'];
        $absensi->jam_keluar = $validateData['jam_keluar'];
        $absensi->tgl_absensi = Carbon::now();
        $absensi->save();

        return redirect('/absensi')->with('pesan', 'data berhasil ditambahkan');
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
        $absensi = Absensi::where('id_absensi', $id)->first();
        return view('absensis.edit', ['absensi' => $absensi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'nip' => 'required',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
        ]);

        Absensi::where('id_absensi', $id)->update($validateData);
        return redirect('/absensi')->with('pesan', 'data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Absensi::where('id_absensi', $id)->delete();
        return redirect('absensi')->with('pesan', 'data berhasil dihapus');
    }
}
