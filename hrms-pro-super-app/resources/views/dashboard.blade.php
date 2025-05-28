@extends('layouts.app')

@section('content')
<div class="container">
    <h1>ड्यासबोर्ड (Dashboard)</h1>
    @if(auth()->user() && auth()->user()->hasRole('admin'))
        <div class="row">
            <div class="col-md-3">
                <div class="card text-bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">कर्मचारी</h5>
                        <p class="card-text">{{ $employeeCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">संपत्ति</h5>
                        <p class="card-text">{{ $assetCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">बिदा</h5>
                        <p class="card-text">{{ $leaveCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">उपस्थिति</h5>
                        <p class="card-text">{{ $attendanceCount }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-info mt-4">Welcome, Admin! You have full access to manage the HRMS Pro Super App.<br>
        <a href="{{ route('employees.index') }}" class="btn btn-outline-light btn-sm mt-2">Manage Employees</a>
        <a href="{{ route('assets.index') }}" class="btn btn-outline-light btn-sm mt-2">Manage Assets</a>
        <a href="{{ route('leaves.index') }}" class="btn btn-outline-light btn-sm mt-2">Manage Leaves</a>
        <a href="{{ route('attendances.index') }}" class="btn btn-outline-light btn-sm mt-2">Manage Attendance</a>
        <a href="{{ route('payrolls.index') }}" class="btn btn-outline-light btn-sm mt-2">Manage Payroll</a>
        <a href="{{ route('holidays.index') }}" class="btn btn-outline-light btn-sm mt-2">Manage Holidays</a>
        </div>
    @else
        <div class="alert alert-success">Welcome, {{ auth()->user()->name ?? 'User' }}! Here is your summary:</div>
        <ul>
            <li>Today Attendance: {{ $todayAttendance }}</li>
            <li>Pending Leaves: {{ $pendingLeaves }}</li>
            <li>Upcoming Holidays: {{ $upcomingHolidays }}</li>
        </ul>
    @endif
</div>
@endsection
