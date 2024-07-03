<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;


class PegawaiController extends Controller
{



    public function index()
    {
        $pegawais = Pegawai::with('jabatan')->get();
        return view('pegawais.index', ['pegawais' => $pegawais]);
    }

    public function create()
    {
        return view('pegawais.create', [
            'jabatan' => Jabatan::all(),
            'department' => Department::all(),
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

    $request->validate([
        'nopeg' => 'required|unique:pegawai|max:10|min:10',
        'nama' => 'required',
        'alamat' => 'required',
        'tgl_lahir' => 'required|date',
        'j_kelamin' => 'required',
        'email' => 'required|email|unique:pegawai',
        'id_jabatan' => 'required|exists:jabatan,id_jabatan',
        'id_dept' => 'required|exists:department,id_dept',
    ]);// dd($request->all());

        Pegawai::create($request->all());
        // DB::insert(
        //     'insert into pegawai (nip, nama,alamat,tgl_lahir,j_kelamin,email,id_jabatan,id_dept)
        //     values (?, ?,?,?,?,?,?,?)', [
        //         $request['nip'],
        //         $request['nama'],
        //         $request['alamat'],
        //         $request['tgl_lahir'],
        //         $request['j_kelamin'],
        //         $request['id_jabatan'],
        //         $request['id_dept'],
        //     ]);

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai created successfully.');
    }

    public function show($nip)
    {
        //
    }

    public function edit($nip)
    {
        $pegawai = Pegawai::find($nip)->first();
        return view('pegawais.edit', [
            'pegawai' => $pegawai,
            'jabatan' => Jabatan::all(),
            'department' => Department::all(),
        ]);
    }

    public function update(Request $request, $nip)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required|date',
            'j_kelamin' => 'required',
            'email' => 'required|email',
            'id_jabatan' => 'required|exists:jabatan,id_jabatan',
            'id_dept' => 'required|exists:department,id_dept',
        ]);

        $pegawai = Pegawai::find($nip);
        $pegawai->update($validateData);

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai updated successfully');
    }

    public function destroy($nip)
    {
        Pegawai::find($nip)->delete();

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai deleted successfully');
    }
}
