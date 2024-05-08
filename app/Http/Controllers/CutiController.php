<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cuti.index', [
            'data' => Cuti::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cuti.create', [
            'pegawai' => Pegawai::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'jenis_cuti' => 'required',
            'keterangan' => 'required',
        ]);

        Cuti::create($validatedData);

        return redirect('/cuti')->with('pesan', 'data berhasil ditambahkan');
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
        return view('cuti.edit', [
            'data' => Cuti::where('id_cuti', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nip' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'jenis_cuti' => 'required',
            'keterangan' => 'required',
        ]);

        Cuti::where('id_cuti', $id)->update($validatedData);

        return redirect('/cuti')->with('pesan', 'data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cuti::where('id_cuti', $id)->delete();
        return redirect('cuti')->with('pesan', 'data berhasil dihapus');
    }
}
