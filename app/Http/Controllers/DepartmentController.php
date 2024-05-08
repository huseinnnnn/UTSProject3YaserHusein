<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departmens = Department::latest()->paginate(10);
        return view('departments.index', ['departments' => $departmens]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData= $request->validate([
            'nama_dept'=>'required|max:50',

        ]);
        Department::create($validateData);
        return redirect('/department')->with('pesan','data berhasil disimpan');
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
        $department = Department::where('id_dept', $id)->get();
        return view('departments.edit', ['department' => $department[0]]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData= $request->validate([
            'nama_dept'=>'required|max:50',

        ]);
        Department::where('id_dept', $id)->update($validateData);
        return redirect('/department')->with('pesan','data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Department::where('id_dept', $id)->delete();
        return redirect('/department')->with('pesan','data berhasil dihapus');
    }
}
