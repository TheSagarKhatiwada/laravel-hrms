@extends('layouts.app')

@section('content')
<div class="container">
    <h1>पेरोल सम्पादन गर्नुहोस् (Edit Payroll)</h1>
    <form action="{{ route('payrolls.update', $payroll->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="employee_id" class="form-label">कर्मचारी (Employee)</label>
            <select class="form-control" id="employee_id" name="employee_id" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" @if($payroll->employee_id==$employee->id) selected @endif>{{ $employee->first_name }} {{ $employee->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="basic_salary" class="form-label">मूल तलब (Basic Salary)</label>
            <input type="number" step="0.01" class="form-control" id="basic_salary" name="basic_salary" value="{{ $payroll->basic_salary }}" required>
        </div>
        <div class="mb-3">
            <label for="allowances" class="form-label">भत्ता (Allowances)</label>
            <input type="number" step="0.01" class="form-control" id="allowances" name="allowances" value="{{ $payroll->allowances }}">
        </div>
        <div class="mb-3">
            <label for="deductions" class="form-label">कटौती (Deductions)</label>
            <input type="number" step="0.01" class="form-control" id="deductions" name="deductions" value="{{ $payroll->deductions }}">
        </div>
        <div class="mb-3">
            <label for="pay_date" class="form-label">मिति (Pay Date)</label>
            <input type="date" class="form-control" id="pay_date" name="pay_date" value="{{ $payroll->pay_date }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">स्थिति (Status)</label>
            <select class="form-control" id="status" name="status">
                <option value="pending" @if($payroll->status=='pending') selected @endif>Pending</option>
                <option value="paid" @if($payroll->status=='paid') selected @endif>Paid</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
