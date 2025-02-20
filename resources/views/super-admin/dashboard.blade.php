@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Logout Button at the Top-Right -->
    <div class="d-flex justify-content-end mb-3">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    <h2>Super Admin Dashboard</h2>

    <div class="row">
        <!-- User Management Section -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">User Management</h4>
                    <p class="card-text">Manage users and their roles in the system. Add, update, and delete users as needed.</p>
                    <a href="{{ route('users.index') }}" class="btn btn-primary w-100">Manage Users</a>
                </div>
            </div>
        </div>

        <!-- Grades Section -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Grades</h4>
                    <p class="card-text">View and manage the grades assigned to students. Add, update, and delete grades.</p>
                    <a href="{{ route('grades.index') }}" class="btn btn-primary w-100">View Grades</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
