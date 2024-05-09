@extends('layouts.app')

@section('content')
<div class="container-fluid" style="height: 90vh">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="row">
                <!-- Right Sidebar -->
                <div class="col-md-4 bg-danger" style="height: 90vh">
                    <div class=" p-3">
                        <img src="{{asset('doctor.png')}}" alt="logo" height="70px" width="40px">
                        <h5 class="text-white">MEET YOUR DOCTOR</h5>
                        <div class="d-grid gap-2">
                            <a href="{{route('dashboard')}}" class="btn btn-primary" type="button" target="homeframe">HOME</a>
                            <a href="{{route('appointments.index')}}" class="btn btn-primary" type="button" target="homeframe">APPOINTMENTS</a>
                            <a href="{{route('chat')}}" class="btn btn-primary" type="button" target="homeframe">MESSAGES</a>
                            <a href="{{route('schedules.index')}}" class="btn btn-primary" type="button" target="homeframe">SCHEDULE</a>
                        </div>
                    </div>
                </div>
                
                <!-- Main Content Area -->
                <div class="col">
                    <iframe src="{{route('dashboard')}}" frameborder="0" style="height: 90vh; width:100%;" name="homeframe"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
