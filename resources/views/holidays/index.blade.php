@extends('layouts.app')

@section('content')
<div class="container">
    <h1>बिदा (Holiday) सूची</h1>
    <a href="{{ route('holidays.create') }}" class="btn btn-primary mb-3">नयाँ बिदा थप्नुहोस् (Add Holiday)</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>नाम (Name)</th>
                <th>मिति (Date)</th>
                <th>नेपाली मिति (Nepali Date)</th>
                <th>प्रकार (Type)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($holidays as $holiday)
            <tr>
                <td>{{ $holiday->id }}</td>
                <td>{{ $holiday->name }}</td>
                <td>{{ $holiday->date }}</td>
                <td>{{ $holiday->nepali_date }}</td>
                <td>{{ $holiday->type }}</td>
                <td>
                    <a href="{{ route('holidays.edit', $holiday->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('holidays.destroy', $holiday->id) }}" method="POST" style="display:inline-block;">
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
