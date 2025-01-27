<html>
<head>
    <title>User Registration</title>
</head>
<body>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    @extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="text-center mb-4">Register</h2>
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control" name="role" required>
                    <option value="admin">admin</option>
                    <option value="super-admin">super-admin</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            {{-- <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div> --}}
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <div class="mt-3 text-center">
            <a href="{{ route('login') }}">Already have an account? Login</a>
        </div>
    </div>
</div>
@endsection
</body>
</html>
