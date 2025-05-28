@extends('layouts.app')

@section('content')
<div class="container">
    <h1>पेरोल सूची (Payroll List)</h1>
    <a href="{{ route('payrolls.create') }}" class="btn btn-primary mb-3">नयाँ पेरोल थप्नुहोस् (Add Payroll)</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>कर्मचारी (Employee)</th>
                <th>मूल तलब (Basic Salary)</th>
                <th>भत्ता (Allowances)</th>
                <th>कटौती (Deductions)</th>
                <th>नेट तलब (Net Salary)</th>
                <th>मिति (Pay Date)</th>
                <th>स्थिति (Status)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payrolls as $payroll)
            <tr>
                <td>{{ $payroll->id }}</td>
                <td>{{ $payroll->employee->first_name ?? '' }} {{ $payroll->employee->last_name ?? '' }}</td>
                <td>{{ $payroll->basic_salary }}</td>
                <td>{{ $payroll->allowances }}</td>
                <td>{{ $payroll->deductions }}</td>
                <td>{{ $payroll->net_salary }}</td>
                <td>{{ $payroll->pay_date }}</td>
                <td>{{ $payroll->status }}</td>
                <td>
                    <a href="{{ route('payrolls.edit', $payroll->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('payrolls.destroy', $payroll->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
