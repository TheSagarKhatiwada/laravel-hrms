@extends('layouts.app')

@section('content')
<div class="container">
    <h1>नयाँ संपत्ति थप्नुहोस् (Add New Asset)</h1>
    <form action="{{ route('assets.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">नाम (Name)</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">प्रकार (Type)</label>
            <input type="text" class="form-control" id="type" name="type" required>
        </div>
        <div class="mb-3">
            <label for="assigned_to" class="form-label">जिम्मेवार (Assigned To)</label>
            <input type="text" class="form-control" id="assigned_to" name="assigned_to">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">स्थिति (Status)</label>
            <select class="form-control" id="status" name="status">
                <option value="available">Available</option>
                <option value="assigned">Assigned</option>
                <option value="returned">Returned</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">विवरण (Description)</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
