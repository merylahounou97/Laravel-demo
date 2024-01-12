<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservation.index', ['reservations' => $reservations]);
    }

    public function create()
    {
        $users = User::all();
        $schedules = Schedule::all();
        return view('reservation.create', [
            'users' => $users,
            'schedules' => $schedules
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_users' => 'required',
            // 'id_trainings' => 'required',
            'id_schedules' => 'required'
        ]);

        Reservation::create([
            'id_users' => $request->id_users,
            // 'id_trainings' => $request->id_trainings,
            'id_schedules' => $request->id_schedules
        ]);

        return redirect()->route('reservation.index')
            ->with('success', 'Reservation created successfully.');
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservation.edit', ['reservation' => $reservation]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_users' => 'required',
            // 'id_trainings' => 'required',
            'id_schedules' => 'required'
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'id_users' => $request->id_users,
            // 'id_trainings' => $request->id_trainings,
            'id_schedules' => $request->id_schedules
        ]);

        return redirect()->route('reservation.index')
            ->with('success', 'Reservation updated successfully');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('reservation.index')
            ->with('success', 'Reservation deleted successfully');
    }
}
