@extends('layouts.app')

@section('content')
<div class="container">
    <h1>कर्मचारी सम्पादन गर्नुहोस् (Edit Employee)</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="first_name" class="form-label">पहिलो नाम (First Name)</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">थर (Last Name)</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">ईमेल (Email)</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">फोन (Phone)</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}">
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">विभाग (Department)</label>
            <input type="text" class="form-control" id="department" name="department" value="{{ $employee->department }}">
        </div>
        <div class="mb-3">
            <label for="designation" class="form-label">पद (Designation)</label>
            <input type="text" class="form-control" id="designation" name="designation" value="{{ $employee->designation }}">
        </div>
        <div class="mb-3">
            <label for="date_of_joining" class="form-label">Join Date</label>
            <input type="date" class="form-control" id="date_of_joining" name="date_of_joining" value="{{ $employee->date_of_joining }}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">स्थिति (Status)</label>
            <select class="form-control" id="status" name="status">
                <option value="active" @if($employee->status=='active') selected @endif>Active</option>
                <option value="inactive" @if($employee->status=='inactive') selected @endif>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
