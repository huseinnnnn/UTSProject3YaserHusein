<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('gaji.index', [
            'data' => Gaji::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gaji.create', [
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
            'tgl_gaji' => 'required',
            'gaji' => 'required|integer',
            'tunjangan' => 'required|integer',
        ]);

        $tunjangan = $validatedData['tunjangan'] / 100 * $validatedData['gaji'];
        $total_gaji = $validatedData['gaji'] + $tunjangan;

        $gaji = new Gaji();
        $gaji->nip = $validatedData['nip'];
        $gaji->tgl_gaji = $validatedData['tgl_gaji'];
        $gaji->gaji = $validatedData['gaji'];
        $gaji->tunjangan = $validatedData['tunjangan'];
        $gaji->total_gaji = $total_gaji;
        $gaji->save();

        return redirect('/gaji')->with('pesan', 'data berhasil ditambahkan');
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
        return view('gaji.edit', [
            'gaji' => Gaji::where('id_gaji', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nip' => 'required',
            'tgl_gaji' => 'required',
            'gaji' => 'required|integer',
            'tunjangan' => 'required|integer',
        ]);

        $tunjangan = $validatedData['tunjangan'] / 100 * $validatedData['gaji'];
        $total_gaji = $validatedData['gaji'] + $tunjangan;

        $gaji = Gaji::find($id);
        $gaji->nip = $validatedData['nip'];
        $gaji->tgl_gaji = $validatedData['tgl_gaji'];
        $gaji->gaji = $validatedData['gaji'];
        $gaji->tunjangan = $validatedData['tunjangan'];
        $gaji->total_gaji = $total_gaji;
        $gaji->save();

        return redirect('/gaji')->with('pesan', 'data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gaji::where('id_gaji', $id)->delete();
        return redirect('gaji')->with('pesan', 'data berhasil dihapus');
    }
}
