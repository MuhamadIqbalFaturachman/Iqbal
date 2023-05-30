<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use App\Exports\ExportPositions;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    public function index()
    {
        $title = "Data Pengajar";
        $teacher = Teachers::orderBy('id', 'asc')->paginate(5);
        return view('teachers.index', compact(['teacher', 'title']));
    }

    public function create()
    {
        $title = "Tambah Data Pengajar";
        return view('teachers.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'alamat',
            'matapelajaran',
        ]);

        Teachers::create($request->post());

        return redirect()->route('teachers.index')->with('success', 'Teacher has been created successfully.');
    }


    public function show(Teachers $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }


    public function edit(Teachers $teacher)
    {
        $title = "Edit Data Pengajar";
        return view('teachers.edit', compact(['teacher', 'title']));
    }


    public function update(Request $request, Teachers $teacher)
    {
        $request->validate([
            'name' => 'required',
            'alamat',
            'matapelajaran'
        ]);

        $teacher->fill($request->post())->save();

        return redirect()->route('teachers.index')->with('success', 'Teacher Has Been updated successfully');
    }


    public function destroy(Teachers $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher has been deleted successfully');
    }
    public function exportExcel()
    {
        return Excel::download(new ExportTeachers, 'teachers.xlsx');
    }
}
