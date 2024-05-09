@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Appointments</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Doctor</th>
                            <th>Patient</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->doctor->name }}</td>
                            <td>{{ $appointment->patient->name }}</td>
                            <td>{{ $appointment->date }}</td>
                            <td>{{ $appointment->time }}</td>
                            <td>{{ $appointment->status }}</td>
                            <td>
                                @if($appointment->status == 'pending')
                                    <form method="POST" action="{{ route('appointments.confirm', $appointment->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">Confirm</button>
                                    </form>
                                    <form method="POST" action="{{ route('appointments.decline', $appointment->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger">Decline</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
