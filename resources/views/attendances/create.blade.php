@extends('layouts.app')

@section('content')
<div class="container">
    <h1>नयाँ उपस्थिति थप्नुहोस् (Add New Attendance)</h1>
    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="employee_id" class="form-label">कर्मचारी (Employee)</label>
            <select class="form-control" id="employee_id" name="employee_id" required>
                <option value="">Select Employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">मिति (Date)</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="check_in" class="form-label">Check In</label>
            <input type="time" class="form-control" id="check_in" name="check_in">
        </div>
        <div class="mb-3">
            <label for="check_out" class="form-label">Check Out</label>
            <input type="time" class="form-control" id="check_out" name="check_out">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">स्थिति (Status)</label>
            <select class="form-control" id="status" name="status">
                <option value="present">Present</option>
                <option value="absent">Absent</option>
                <option value="leave">Leave</option>
                <option value="holiday">Holiday</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="remarks" class="form-label">टिप्पणी (Remarks)</label>
            <textarea class="form-control" id="remarks" name="remarks"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
