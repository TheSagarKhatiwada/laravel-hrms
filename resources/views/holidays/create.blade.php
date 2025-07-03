@extends('layouts.app')

@section('content')
<div class="container">
    <h1>नयाँ बिदा (Holiday) थप्नुहोस्</h1>
    <form action="{{ route('holidays.store') }}" method="POST" id="holidayForm">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">नाम (Name)</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">मिति (Date)</label>
            <div class="d-flex gap-2 mb-2">
                <button type="button" class="btn btn-outline-primary btn-sm" id="toggleAD" onclick="showDateFormat('ad')">AD (English)</button>
                <button type="button" class="btn btn-outline-secondary btn-sm" id="toggleBS" onclick="showDateFormat('bs')">BS (नेपाली)</button>
            </div>
            
            <div id="adDateContainer">
                <label for="date" class="form-label">English Date</label>
                <input type="date" class="form-control" id="date" name="date" onchange="convertToNepali()">
            </div>
            
            <div id="bsDateContainer" style="display: none;">
                <label for="nepali_date" class="form-label">नेपाली मिति (Nepali Date)</label>
                <input type="text" class="form-control" id="nepali_date" name="nepali_date" 
                       placeholder="वव-म-द (जस्तै: 2081-04-15)" onchange="convertToEnglish()">
                <small class="form-text text-muted">मिति ढाँचा: YYYY-MM-DD (जस्तै: 2081-04-15)</small>
            </div>
            
            <!-- Hidden inputs to ensure both formats are sent -->
            <input type="hidden" id="hidden_date" name="date">
            <input type="hidden" id="hidden_nepali_date" name="nepali_date">
        </div>
        
        <div class="mb-3">
            <label for="type" class="form-label">प्रकार (Type)</label>
            <input type="text" class="form-control" id="type" name="type">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">विवरण (Description)</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('holidays.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
let currentFormat = 'ad';

function showDateFormat(format) {
    currentFormat = format;
    
    if (format === 'ad') {
        document.getElementById('adDateContainer').style.display = 'block';
        document.getElementById('bsDateContainer').style.display = 'none';
        document.getElementById('toggleAD').classList.remove('btn-outline-primary');
        document.getElementById('toggleAD').classList.add('btn-primary');
        document.getElementById('toggleBS').classList.remove('btn-secondary');
        document.getElementById('toggleBS').classList.add('btn-outline-secondary');
    } else {
        document.getElementById('adDateContainer').style.display = 'none';
        document.getElementById('bsDateContainer').style.display = 'block';
        document.getElementById('toggleBS').classList.remove('btn-outline-secondary');
        document.getElementById('toggleBS').classList.add('btn-secondary');
        document.getElementById('toggleAD').classList.remove('btn-primary');
        document.getElementById('toggleAD').classList.add('btn-outline-primary');
    }
}

function convertToNepali() {
    const adDate = document.getElementById('date').value;
    if (adDate) {
        // For now, we'll use a simple API call or manual conversion
        // In a full implementation, you'd call your backend API
        document.getElementById('hidden_date').value = adDate;
        
        // Simple approximation for demonstration
        fetch('/api/convert-date/ad-to-bs', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ date: adDate })
        })
        .then(response => response.json())
        .then(data => {
            if (data.nepali_date) {
                document.getElementById('hidden_nepali_date').value = data.nepali_date;
            }
        })
        .catch(error => console.error('Error:', error));
    }
}

function convertToEnglish() {
    const nepaliDate = document.getElementById('nepali_date').value;
    if (nepaliDate) {
        document.getElementById('hidden_nepali_date').value = nepaliDate;
        
        fetch('/api/convert-date/bs-to-ad', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ nepali_date: nepaliDate })
        })
        .then(response => response.json())
        .then(data => {
            if (data.date) {
                document.getElementById('hidden_date').value = data.date;
            }
        })
        .catch(error => console.error('Error:', error));
    }
}

// Set initial state
document.addEventListener('DOMContentLoaded', function() {
    showDateFormat('ad');
});
</script>
@endsection
