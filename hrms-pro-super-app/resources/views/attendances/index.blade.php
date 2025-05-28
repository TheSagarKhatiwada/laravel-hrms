@extends('layouts.app')

@section('content')
<div class="container">
    <h1>उपस्थिति सूची (Attendance List)</h1>
    <a href="{{ route('attendances.create') }}" class="btn btn-primary mb-3">नयाँ उपस्थिति थप्नुहोस् (Add Attendance)</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>कर्मचारी (Employee)</th>
                <th>मिति (Date)</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>स्थिति (Status)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
            <tr>
                <td>{{ $attendance->id }}</td>
                <td>{{ $attendance->employee->first_name ?? '' }} {{ $attendance->employee->last_name ?? '' }}</td>
                <td>{{ $attendance->date }}</td>
                <td>{{ $attendance->check_in }}</td>
                <td>{{ $attendance->check_out }}</td>
                <td>{{ $attendance->status }}</td>
                <td>
                    <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" style="display:inline-block;">
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
