@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <h1 class="text-3xl font-bold text-primary-700 mb-8 text-center">ड्यासबोर्ड (Dashboard)</h1>
    @if(auth()->user() && auth()->user()->hasRole('admin'))
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                <div class="text-4xl font-bold text-primary-600">{{ $employeeCount }}</div>
                <div class="mt-2 text-gray-600">कर्मचारी</div>
            </div>
            <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                <div class="text-4xl font-bold text-green-600">{{ $assetCount }}</div>
                <div class="mt-2 text-gray-600">संपत्ति</div>
            </div>
            <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                <div class="text-4xl font-bold text-yellow-500">{{ $leaveCount }}</div>
                <div class="mt-2 text-gray-600">बिदा</div>
            </div>
            <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                <div class="text-4xl font-bold text-red-500">{{ $attendanceCount }}</div>
                <div class="mt-2 text-gray-600">उपस्थिति</div>
            </div>
        </div>
        <div class="bg-primary-50 border border-primary-100 rounded-lg p-6 text-center shadow">
            <span class="font-semibold text-primary-700">Welcome, Admin!</span> You have full access to manage the HRMS Pro Super App.<br>
            <div class="flex flex-wrap justify-center gap-3 mt-4">
                <a href="{{ route('employees.index') }}" class="px-4 py-2 bg-primary-600 text-white rounded hover:bg-primary-700 transition">Manage Employees</a>
                <a href="{{ route('assets.index') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Manage Assets</a>
                <a href="{{ route('leaves.index') }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">Manage Leaves</a>
                <a href="{{ route('attendances.index') }}" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">Manage Attendance</a>
                <a href="{{ route('payrolls.index') }}" class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800 transition">Manage Payroll</a>
                <a href="{{ route('holidays.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Manage Holidays</a>
            </div>
        </div>
    @else
        <div class="bg-green-50 border border-green-100 rounded-lg p-6 text-center shadow mb-8">
            <span class="font-semibold text-green-700">Welcome, {{ auth()->user()->name ?? 'User' }}!</span> Here is your summary:
        </div>
        <div class="max-w-md mx-auto">
            <ul class="divide-y divide-gray-200 bg-white rounded-xl shadow overflow-hidden">
                <li class="flex justify-between items-center px-6 py-4">
                    <span class="text-gray-700">Today Attendance</span>
                    <span class="font-bold text-primary-600">{{ $todayAttendance }}</span>
                </li>
                <li class="flex justify-between items-center px-6 py-4">
                    <span class="text-gray-700">Pending Leaves</span>
                    <span class="font-bold text-yellow-500">{{ $pendingLeaves }}</span>
                </li>
                <li class="flex justify-between items-center px-6 py-4">
                    <span class="text-gray-700">Upcoming Holidays</span>
                    <span class="font-bold text-blue-500">{{ $upcomingHolidays }}</span>
                </li>
            </ul>
        </div>
    @endif
</div>
@endsection
