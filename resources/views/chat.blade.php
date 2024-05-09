<!-- resources/views/doctors/chat.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Chat</div>
        <div class="card-body">
            <!-- Display incoming messages -->
            @foreach($messages as $message)
                <div>
                    <strong>{{ $message->sender->name }}:</strong> {{ $message->message }}
                </div>
            @endforeach
            <hr>
            <!-- Message Form -->
            <form method="POST" action="{{ route('doctors.send', $doctor->id) }}">
                @csrf
                <input type="hidden" name="receiver_id" value="{{ $patient->id }}">
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>
@endsection
