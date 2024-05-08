<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatans = Jabatan::latest()->paginate(10);
        return view('jabatans.index', ['jabatans' => $jabatans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jabatans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData= $request->validate([
            'nama_jabatan'=>'required|max:25',
            'gaji_pokok'=>'required|numeric',
        ]);
        Jabatan::create($validateData);
        return redirect('/jabatan')->with('pesan','data berhasil disimpan');
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
        $jabatan = Jabatan::where('id_jabatan', $id)->get();
        return view('jabatans.edit', ['jabatan' => $jabatan[0]]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData= $request->validate([
            'nama_jabatan'=>'required|max:25',
            'gaji_pokok'=>'required|numeric',
        ]);
        Jabatan::where('id_jabatan', $id)->update($validateData);
        return redirect('/jabatan')->with('pesan','data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Jabatan::where('id_jabatan', $id)->delete();
        return redirect('/jabatan')->with('pesan','data berhasil dihapus');
    }
}
