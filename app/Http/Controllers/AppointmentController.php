<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;

class AppointmentController extends Controller
{
    public function create()
    {
        $doctors = Doctor::all();
        return view('appointments.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            // Add validation for other appointment fields here
        ]);

        // Create appointment
        $appointment = new Appointment();
        $appointment->doctor_id = $validatedData['doctor_id'];
        // Set other appointment fields
        $appointment->save();

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    public function index()
    {
        $appointments = Appointment::with('doctor', 'patient')->get();
        return view('appointments.index', compact('appointments'));
    }

    public function confirm(Appointment $appointment)
    {
        $appointment->status = 'confirmed';
        $appointment->save();
        return redirect()->route('appointments.index')->with('success', 'Appointment confirmed successfully.');
    }

    public function decline(Appointment $appointment)
    {
        $appointment->status = 'declined';
        $appointment->save();
        return redirect()->route('appointments.index')->with('success', 'Appointment declined successfully.');
    }
}