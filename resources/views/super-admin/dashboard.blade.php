@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Super Admin Dashboard</h2>

    <div class="row">
        <div class="col-md-4">
            <h3>User Management</h3>
            <ul>
                <li><a href="{{ route('users.index') }}">Manage Users</a></li>
            </ul>
        </div>
        <div class="col-md-4">
            <h3>Grades</h3>
            <ul>
                <li><a href="{{ route('grades.index') }}">View Grades</a></li>
            </ul>
        </div>
        <div class="col-md-4">
            <h3>Sections</h3>
            <ul>
                <li><a href="{{ route('sections.index') }}">Manage Sections</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
