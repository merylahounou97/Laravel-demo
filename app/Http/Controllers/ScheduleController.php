<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Training;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedule.index', ['schedules' => $schedules]);
    }

    public function create()
    {
        $trainings = Training::all();
        return view('schedule.create', ['trainings' => $trainings]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_trainings' => 'required|numeric',
            'start_hour' => 'required|date',
            'end_hour' => 'required|date',
        ]);

        // Schedule::create([
        //     'id_trainings' => $request->id_trainings,
        //     'start_hour' => $request->start_hour,
        //     'end_hour' => $request->end_hour,
        // ]);

        $schedule = new Schedule();
        $schedule->id_trainings = $request->input('id_trainings');
        $schedule->start_hour = $request->input('start_hour');
        $schedule->end_hour = $request->input('end_hour');
        $schedule->save();


        return redirect()->route('schedule.index');
    }

    public function edit($id)
    {
        $schedule = Schedule::find($id);
        // $trainings = Training::all();
        return view('schedule.edit', ['schedule' => $schedule]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_trainings' => 'required|numeric',
            'start_hour' => 'required|date',
            'end_hour' => 'required|date',
        ]);

        $schedule = Schedule::find($id);
        $schedule->id_trainings = $request->input('id_trainings');
        $schedule->start_hour = $request->input('start_hour');
        $schedule->end_hour = $request->input('end_hour');
        $schedule->save();

        return redirect()->route('schedule.index');
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();

        return redirect()->route('schedule.index');
    }
}
