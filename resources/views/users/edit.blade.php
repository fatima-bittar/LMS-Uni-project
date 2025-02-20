@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('users.index') }}" class="btn btn-light mb-3" style="position: absolute; top: 10px; left: 10px; text-decoration: none;">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    <h2>Edit User: {{ $user->first_name }} {{ $user->last_name }}</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password (Leave blank to keep current password)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" name="role" required>
                <option value="admin" @if($user->role == 'admin') selected @endif>admin</option>
                <option value="super-admin" @if($user->role == 'super-admin') selected @endif>super-admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
