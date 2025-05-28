@extends('layouts.app')

@section('content')
<div class="container">
    <h1>संपत्ति सम्पादन गर्नुहोस् (Edit Asset)</h1>
    <form action="{{ route('assets.update', $asset->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">नाम (Name)</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $asset->name }}" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">प्रकार (Type)</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $asset->type }}" required>
        </div>
        <div class="mb-3">
            <label for="assigned_to" class="form-label">जिम्मेवार (Assigned To)</label>
            <input type="text" class="form-control" id="assigned_to" name="assigned_to" value="{{ $asset->assigned_to }}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">स्थिति (Status)</label>
            <select class="form-control" id="status" name="status">
                <option value="available" @if($asset->status=='available') selected @endif>Available</option>
                <option value="assigned" @if($asset->status=='assigned') selected @endif>Assigned</option>
                <option value="returned" @if($asset->status=='returned') selected @endif>Returned</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">विवरण (Description)</label>
            <textarea class="form-control" id="description" name="description">{{ $asset->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
