@extends('layouts.app')

@section('content')
<div class="container">
    <h1>उपस्थिति सम्पादन गर्नुहोस् (Edit Attendance)</h1>
    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="employee_id" class="form-label">कर्मचारी (Employee)</label>
            <select class="form-control" id="employee_id" name="employee_id" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" @if($attendance->employee_id==$employee->id) selected @endif>{{ $employee->first_name }} {{ $employee->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">मिति (Date)</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $attendance->date }}" required>
        </div>
        <div class="mb-3">
            <label for="check_in" class="form-label">Check In</label>
            <input type="time" class="form-control" id="check_in" name="check_in" value="{{ $attendance->check_in }}">
        </div>
        <div class="mb-3">
            <label for="check_out" class="form-label">Check Out</label>
            <input type="time" class="form-control" id="check_out" name="check_out" value="{{ $attendance->check_out }}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">स्थिति (Status)</label>
            <select class="form-control" id="status" name="status">
                <option value="present" @if($attendance->status=='present') selected @endif>Present</option>
                <option value="absent" @if($attendance->status=='absent') selected @endif>Absent</option>
                <option value="leave" @if($attendance->status=='leave') selected @endif>Leave</option>
                <option value="holiday" @if($attendance->status=='holiday') selected @endif>Holiday</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="remarks" class="form-label">टिप्पणी (Remarks)</label>
            <textarea class="form-control" id="remarks" name="remarks">{{ $attendance->remarks }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
