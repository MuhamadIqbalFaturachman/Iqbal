<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Teachers;
class ScheduleController extends Controller
{
    public function index()
    {
        $title = "Data Master Jadwal";
        $schedules = Schedule::orderBy('id', 'asc')->paginate(5);
        return view('schedules.index', compact(['schedules', 'title']));
    }

    public function create()
    {
        $title = "Tambah Data Jadwal";
        $teacher = Teachers::all();
        return view('schedules.create', compact('title', 'teacher'));
    }

    public function store(Request $request)
    {
        $request->validate
        (['name' => 'required',
            'jadwal',
            'matapelajaran'
        ]);

        Schedule::create($request->post());

        return redirect()->route('schedules.index')->with('success', 'schedules has been created successfully.');
    }


    public function show(Schedule $schedules)
    {
        return view('schedules.show', compact('schedules'));
    }


    public function edit(Schedule $schedules)
    {
        $title = "Edit Data Jadwal";
        $teachers = Teachers::all();
        return view('schedules.edit', compact('schedules', 'title', 'teachers'));
    }


    public function update(Request $request, Schedule $schedules)
    {
        $request->validate(['name' => 'required',
            'jadwal',
            'matapelajaran'
        ]);

        $schedules->fill($request->post())->save();

        return redirect()->route('schedules.index')->with('success', 'Schedules Has Been updated successfully');
    }


    public function destroy(Schedule $schedules)
    {
        $schedules->delete();
        return redirect()->route('schedules.index')->with('success', 'Schedules has been deleted successfully');
    }
    public function exportExcel()
    {
        return Excel::download(new ExportSchedules, 'schedules.xlsx');
    }   
}
