@extends('layouts.app')

@section('content')
<div class="container">
    <h1>संपत्ति सूची (Asset List)</h1>
    <a href="{{ route('assets.create') }}" class="btn btn-primary mb-3">नयाँ संपत्ति थप्नुहोस् (Add Asset)</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>कोड (Code)</th>
                <th>नाम (Name)</th>
                <th>प्रकार (Type)</th>
                <th>जिम्मेवार (Assigned To)</th>
                <th>स्थिति (Status)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
            <tr>
                <td>{{ $asset->id }}</td>
                <td>{{ $asset->asset_code }}</td>
                <td>{{ $asset->name }}</td>
                <td>{{ $asset->type }}</td>
                <td>{{ $asset->assigned_to }}</td>
                <td>{{ $asset->status }}</td>
                <td>
                    <a href="{{ route('assets.edit', $asset->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('assets.destroy', $asset->id) }}" method="POST" style="display:inline-block;">
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
