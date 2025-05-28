@extends('layouts.app')

@section('content')
<div class="container">
    <h1>बिदा (Holiday) सम्पादन गर्नुहोस्</h1>
    <form action="{{ route('holidays.update', $holiday->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">नाम (Name)</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $holiday->name }}" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">मिति (Date)</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $holiday->date }}" required>
        </div>
        <div class="mb-3">
            <label for="nepali_date" class="form-label">नेपाली मिति (Nepali Date)</label>
            <input type="text" class="form-control" id="nepali_date" name="nepali_date" value="{{ $holiday->nepali_date }}">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">प्रकार (Type)</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $holiday->type }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">विवरण (Description)</label>
            <textarea class="form-control" id="description" name="description">{{ $holiday->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
