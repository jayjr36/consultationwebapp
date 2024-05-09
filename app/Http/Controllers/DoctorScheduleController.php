<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    // DoctorScheduleController.php

public function index(Doctor $doctor)
{
    $schedules = $doctor->schedules()->get();
    return view('schedule.schedule', compact('doctor', 'schedules'));
}

}
