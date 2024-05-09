<?php

// ChatController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Message;

class ChatController extends Controller
{
    public function index(Doctor $doctor)
    {
        $messages = $doctor->messages()->with('sender')->latest()->get();
        return view('doctors.chat', compact('doctor', 'messages'));
    }

    public function send(Request $request, Doctor $doctor)
    {
        $validatedData = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $message = new Message();
        $message->sender_id = $doctor->id;
        $message->receiver_id = $request->input('receiver_id'); 
        $message->message = $validatedData['message'];
        $message->save();

        return redirect()->route('doctors.chat', $doctor->id)->with('success', 'Message sent successfully.');
    }
}

