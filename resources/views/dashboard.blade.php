<!-- dashboard.blade.php -->
@if(auth()->user()->role == 'admin')
    <a href="{{ route('admin.dashboard') }}">Go to Admin Dashboard</a>
@elseif(auth()->user()->role == 'super-admin')
    <a href="{{ route('super-admin.dashboard') }}">Go to Super Admin Dashboard</a>
@else
    <p>Welcome, {{ auth()->user()->first_name }}!</p>
@endif
