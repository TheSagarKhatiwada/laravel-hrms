@extends('layouts.app')

@section('content')
<div class="container">
    <h1>बिदा सूची (Leave List)</h1>
    <a href="{{ route('leaves.create') }}" class="btn btn-primary mb-3">नयाँ बिदा थप्नुहोस् (Add Leave)</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>कर्मचारी (Employee)</th>
                <th>प्रकार (Type)</th>
                <th>शुरु मिति (Start Date)</th>
                <th>अन्त्य मिति (End Date)</th>
                <th>स्थिति (Status)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
            <tr>
                <td>{{ $leave->id }}</td>
                <td>{{ $leave->employee->first_name ?? '' }} {{ $leave->employee->last_name ?? '' }}</td>
                <td>{{ $leave->leave_type }}</td>
                <td>{{ $leave->start_date }}</td>
                <td>{{ $leave->end_date }}</td>
                <td>{{ $leave->status }}</td>
                <td>
                    <a href="{{ route('leaves.edit', $leave->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST" style="display:inline-block;">
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
