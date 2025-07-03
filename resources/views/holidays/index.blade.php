@extends('layouts.app')

@section('content')
<div class="container">
    <h1>बिदा (Holiday) सूची</h1>
    <a href="{{ route('holidays.create') }}" class="btn btn-primary mb-3">नयाँ बिदा थप्नुहोस् (Add Holiday)</a>
    
    <div class="mb-3">
        <button type="button" class="btn btn-sm btn-outline-info" id="toggleDateFormat" onclick="toggleDateDisplay()">
            Switch to Nepali Dates
        </button>
    </div>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>नाम (Name)</th>
                <th id="dateHeader">मिति (Date)</th>
                <th>प्रकार (Type)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($holidays as $holiday)
            <tr>
                <td>{{ $holiday->id }}</td>
                <td>{{ $holiday->name }}</td>
                <td>
                    <span class="ad-date">{{ $holiday->date }}</span>
                    <span class="bs-date" style="display: none;">
                        @if($holiday->nepali_date)
                            {{ $holiday->nepali_date }}
                            @if(method_exists($holiday, 'getFormattedNepaliDate'))
                                <br><small class="text-muted">{{ $holiday->getFormattedNepaliDate('nepali_date') }}</small>
                            @endif
                        @else
                            {{ app('App\Services\NepaliDateService')::adToBs($holiday->date)['formatted'] }}
                        @endif
                    </span>
                </td>
                <td>{{ $holiday->type }}</td>
                <td>
                    <a href="{{ route('holidays.edit', $holiday->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('holidays.destroy', $holiday->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
let showNepaliDates = false;

function toggleDateDisplay() {
    showNepaliDates = !showNepaliDates;
    const adDates = document.querySelectorAll('.ad-date');
    const bsDates = document.querySelectorAll('.bs-date');
    const toggleButton = document.getElementById('toggleDateFormat');
    const dateHeader = document.getElementById('dateHeader');
    
    if (showNepaliDates) {
        adDates.forEach(date => date.style.display = 'none');
        bsDates.forEach(date => date.style.display = 'block');
        toggleButton.textContent = 'Switch to English Dates';
        dateHeader.textContent = 'नेपाली मिति (Nepali Date)';
    } else {
        adDates.forEach(date => date.style.display = 'block');
        bsDates.forEach(date => date.style.display = 'none');
        toggleButton.textContent = 'Switch to Nepali Dates';
        dateHeader.textContent = 'मिति (Date)';
    }
}
</script>
@endsection
