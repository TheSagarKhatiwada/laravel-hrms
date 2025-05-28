@extends('layouts.app')

@section('content')
<div class="container">
    <h1>कर्मचारी सूची (Employee List)</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">नयाँ कर्मचारी थप्नुहोस् (Add Employee)</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>नाम (Name)</th>
                <th>ईमेल (Email)</th>
                <th>फोन (Phone)</th>
                <th>विभाग (Department)</th>
                <th>पद (Designation)</th>
                <th>स्थिति (Status)</th>
                <th>Join Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->department }}</td>
                <td>{{ $employee->designation }}</td>
                <td>{{ $employee->status }}</td>
                <td>{{ $employee->date_of_joining }}</td>
                <td>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
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
