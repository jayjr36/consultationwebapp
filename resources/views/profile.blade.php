<!-- resources/views/doctors/profile.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Update Profile</div>
        <div class="card-body">
            <form method="POST" action="{{ route('doctors.update', $doctor->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $doctor->name }}" required>
                </div>
                <div class="form-group">
                    <label for="specialization">Specialization</label>
                    <input type="text" class="form-control" id="specialization" name="specialization" value="{{ $doctor->specialization }}" required>
                </div>
                <!-- Add other doctor fields here -->
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
