<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function profile(Doctor $doctor)
    {
        return view('doctors.profile', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            // Add validation for other doctor fields here
        ]);

        $doctor->update($validatedData);

        return redirect()->route('doctors.profile', $doctor->id)->with('success', 'Profile updated successfully.');
    }
}
