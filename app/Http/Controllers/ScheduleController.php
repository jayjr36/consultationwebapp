<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    // ScheduleController.php

public function store(Request $request, Doctor $doctor)
{
    $validatedData = $request->validate([
        'date' => 'required|date',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i|after:start_time',
    ]);
    $doctorId = Auth::id();
    $schedule = new Schedule();
    $schedule->doctor_id = $doctorId;
    $schedule->date = $validatedData['date'];
    $schedule->start_time = $validatedData['start_time'];
    $schedule->end_time = $validatedData['end_time'];
    $schedule->save();

    return redirect()->route('doctors.schedules.index', $doctor->id)->with('success', 'Schedule created successfully.');
}

// ScheduleController.php

public function update(Request $request, Doctor $doctor, Schedule $schedule)
{
    $validatedData = $request->validate([
        'date' => 'required|date',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i|after:start_time',
    ]);

    $schedule->date = $validatedData['date'];
    $schedule->start_time = $validatedData['start_time'];
    $schedule->end_time = $validatedData['end_time'];
    $schedule->save();

    return redirect()->route('doctors.schedules.index', $doctor->id)->with('success', 'Schedule updated successfully.');
}

public function destroy(Doctor $doctor, Schedule $schedule)
{
    $schedule->delete();
    return redirect()->route('doctors.schedules.index', $doctor->id)->with('success', 'Schedule deleted successfully.');
}


}
