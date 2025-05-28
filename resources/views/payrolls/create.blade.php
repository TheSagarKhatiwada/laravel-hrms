@extends('layouts.app')

@section('content')
<div class="container">
    <h1>नयाँ पेरोल थप्नुहोस् (Add New Payroll)</h1>
    <form action="{{ route('payrolls.store') }}" method="POST">
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
            <label for="basic_salary" class="form-label">मूल तलब (Basic Salary)</label>
            <input type="number" step="0.01" class="form-control" id="basic_salary" name="basic_salary" required>
        </div>
        <div class="mb-3">
            <label for="allowances" class="form-label">भत्ता (Allowances)</label>
            <input type="number" step="0.01" class="form-control" id="allowances" name="allowances">
        </div>
        <div class="mb-3">
            <label for="deductions" class="form-label">कटौती (Deductions)</label>
            <input type="number" step="0.01" class="form-control" id="deductions" name="deductions">
        </div>
        <div class="mb-3">
            <label for="pay_date" class="form-label">मिति (Pay Date)</label>
            <input type="date" class="form-control" id="pay_date" name="pay_date" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">स्थिति (Status)</label>
            <select class="form-control" id="status" name="status">
                <option value="pending">Pending</option>
                <option value="paid">Paid</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
