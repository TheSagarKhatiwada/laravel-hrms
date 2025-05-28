<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <a href="/" class="flex items-center text-xl font-bold text-primary-600">{{ config('app.name') }}</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('employees.index') }}" class="text-gray-700 hover:text-primary-600 font-medium">कर्मचारी</a>
                    <a href="{{ route('assets.index') }}" class="text-gray-700 hover:text-primary-600 font-medium">संपत्ति</a>
                    <a href="{{ route('leaves.index') }}" class="text-gray-700 hover:text-primary-600 font-medium">बिदा</a>
                    <a href="{{ route('holidays.index') }}" class="text-gray-700 hover:text-primary-600 font-medium">बिदा</a>
                    <a href="{{ route('attendances.index') }}" class="text-gray-700 hover:text-primary-600 font-medium">उपस्थिति</a>
                    <a href="{{ route('payrolls.index') }}" class="text-gray-700 hover:text-primary-600 font-medium">पेरोल</a>
                </div>
            </div>
        </div>
    </nav>
    <main class="py-8">
        @yield('content')
    </main>
</body>
</html>
