<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('employees.index') }}">कर्मचारी (Employees)</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('assets.index') }}">संपत्ति (Assets)</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('leaves.index') }}">बिदा (Leaves)</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('holidays.index') }}">बिदा (Holidays)</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('attendances.index') }}">उपस्थिति (Attendance)</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('payrolls.index') }}">पेरोल (Payroll)</a></li>
                    <!-- Add more nav items as needed -->
                </ul>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
