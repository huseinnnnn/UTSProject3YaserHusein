<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Jabatan;
use App\Models\Karyawan_jobdept;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class KaryawanJobdeptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jobdept.index', ['data' => Karyawan_jobdept::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobdept.create', [
            'pegawai' => Pegawai::all(),
            'departments' => Department::all(),
            'jabatans' => Jabatan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nip' => 'required',
            'id_dept' => 'required',
            'id_jabatan' => 'required',
            'tgl_mulai' => 'required'
        ]);

        Karyawan_jobdept::create($validateData);
        return redirect('/jobdept')->with('pesan', 'data berhasil disimpan');
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
        return view('jobdept.edit', [
            'pegawai' => Pegawai::all(),
            'departments' => Department::all(),
            'jabatans' => Jabatan::all(),
            'data' => Karyawan_jobdept::where('id_jobdept', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'nip' => 'required',
            'id_dept' => 'required',
            'id_jabatan' => 'required',
            'tgl_mulai' => 'required'
        ]);

        Karyawan_jobdept::where('id_jobdept', $id)->update($validateData);
        return redirect('/jobdept')->with('pesan', 'data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Karyawan_jobdept::where('id_jobdept', $id)->delete();
        return redirect('/jobdept')->with('pesan', 'data berhasil dihapus');
    }
}
