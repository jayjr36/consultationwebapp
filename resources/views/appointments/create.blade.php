@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Make Appointment</div>
        <div class="card-body">
            <form method="POST" action="{{ route('appointments.store') }}">
                @csrf
                <div class="form-group">
                    <label for="doctor">Select Doctor</label>
                    <select class="form-control" id="doctor" name="doctor_id">
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Add other appointment fields here -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
