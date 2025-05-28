<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
    <style>
        body { background: var(--bs-body-bg, #f4f6f9); }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--bs-dark) 0%, #23272b 100%);
            color: #fff;
            box-shadow: 2px 0 8px rgba(0,0,0,0.08);
        }
        .sidebar .user-panel {
            padding: 1.5rem 1.25rem 1rem 1.25rem;
            background: rgba(255,255,255,0.05);
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .sidebar .user-panel img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-bottom: 0.5rem;
            border: 2px solid #adb5bd;
        }
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
        }
        .sidebar a.active, .sidebar a:hover {
            color: #fff;
            background: #495057;
        }
        .sidebar .nav-link {
            padding: 0.75rem 1.25rem;
            border-radius: 0.375rem;
            margin-bottom: 0.25rem;
            font-size: 1.05rem;
            display: flex;
            align-items: center;
        }
        .sidebar .nav-link i {
            width: 1.5rem;
            margin-right: 0.75rem;
        }
        .content-wrapper {
            margin-left: 260px;
            padding: 2.5rem 2rem 2rem 2rem;
        }
        @media (max-width: 991.98px) {
            .sidebar { min-width: 100vw; position: static; }
            .content-wrapper { margin-left: 0; }
        }
        .navbar {
            background: linear-gradient(90deg, #007bff 0%, #6610f2 100%) !important;
            color: #fff;
        }
        .navbar .navbar-brand, .navbar .nav-link, .navbar .dropdown-item {
            color: #fff !important;
        }
        .navbar .dropdown-menu {
            background: #343a40;
        }
        .navbar .dropdown-item:hover {
            background: #495057;
            color: #fff;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 2px 16px rgba(0,0,0,0.07);
        }
        /* Dark mode overrides */
        [data-bs-theme="dark"] body {
            background: #181a1b;
        }
        [data-bs-theme="dark"] .sidebar {
            background: linear-gradient(180deg, #181a1b 0%, #23272b 100%);
            color: #fff;
        }
        [data-bs-theme="dark"] .navbar {
            background: linear-gradient(90deg, #23272b 0%, #181a1b 100%) !important;
        }
        [data-bs-theme="dark"] .card {
            background: #23272b;
            color: #fff;
        }
        [data-bs-theme="dark"] .sidebar a {
            color: #adb5bd;
        }
        [data-bs-theme="dark"] .sidebar a.active, [data-bs-theme="dark"] .sidebar a:hover {
            color: #fff;
            background: #343a40;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">
                <i class="fas fa-cogs me-2"></i>{{ config('app.name') }}
            </a>
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-3">
                    <button id="theme-toggle" class="btn btn-outline-light btn-sm" title="Toggle light/dark mode">
                        <i class="fas fa-moon" id="theme-icon"></i>
                    </button>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> {{ Auth::user()->name ?? 'User' }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user-edit me-2"></i>Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="d-flex">
        <nav class="sidebar flex-shrink-0 p-3" style="width: 260px;">
            <div class="user-panel mb-4">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=6c757d&color=fff" alt="User Avatar">
                <div class="fw-bold mt-2">{{ Auth::user()->name ?? 'User' }}</div>
                <div class="small text-secondary">{{ Auth::user()->email ?? '' }}</div>
            </div>
            <ul class="nav nav-pills flex-column mb-auto">
                <li><a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="{{ route('employees.index') }}" class="nav-link"><i class="fas fa-users"></i> Employees</a></li>
                <li><a href="{{ route('assets.index') }}" class="nav-link"><i class="fas fa-box"></i> Assets</a></li>
                <li><a href="{{ route('leaves.index') }}" class="nav-link"><i class="fas fa-calendar-minus"></i> Leaves</a></li>
                <li><a href="{{ route('holidays.index') }}" class="nav-link"><i class="fas fa-calendar"></i> Holidays</a></li>
                <li><a href="{{ route('attendances.index') }}" class="nav-link"><i class="fas fa-clipboard-list"></i> Attendance</a></li>
                <li><a href="{{ route('payrolls.index') }}" class="nav-link"><i class="fas fa-money-check-alt"></i> Payroll</a></li>
                <li><a href="{{ route('roles.index') }}" class="nav-link"><i class="fas fa-user-shield"></i> Roles</a></li>
                <li><a href="{{ route('permissions.index') }}" class="nav-link"><i class="fas fa-key"></i> Permissions</a></li>
            </ul>
        </nav>
        <div class="content-wrapper flex-grow-1">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Light/Dark mode switcher
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        const html = document.documentElement;
        function setTheme(mode) {
            html.setAttribute('data-bs-theme', mode);
            localStorage.setItem('bs-theme', mode);
            themeIcon.className = mode === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
        }
        // On load, set theme from localStorage or system
        (function() {
            let mode = localStorage.getItem('bs-theme');
            if (!mode) {
                mode = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            }
            setTheme(mode);
        })();
        themeToggle.addEventListener('click', function() {
            const current = html.getAttribute('data-bs-theme');
            setTheme(current === 'dark' ? 'light' : 'dark');
        });
    </script>
</body>
</html>
