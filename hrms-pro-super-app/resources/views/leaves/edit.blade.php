@extends('layouts.app')

@section('content')
<div class="container">
    <h1>बिदा सम्पादन गर्नुहोस् (Edit Leave)</h1>
    <form action="{{ route('leaves.update', $leave->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="employee_id" class="form-label">कर्मचारी (Employee)</label>
            <select class="form-control" id="employee_id" name="employee_id" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" @if($leave->employee_id==$employee->id) selected @endif>{{ $employee->first_name }} {{ $employee->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="leave_type" class="form-label">प्रकार (Type)</label>
            <input type="text" class="form-control" id="leave_type" name="leave_type" value="{{ $leave->leave_type }}" required>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">शुरु मिति (Start Date)</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $leave->start_date }}" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">अन्त्य मिति (End Date)</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $leave->end_date }}" required>
        </div>
        <div class="mb-3">
            <label for="reason" class="form-label">कारण (Reason)</label>
            <textarea class="form-control" id="reason" name="reason">{{ $leave->reason }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
