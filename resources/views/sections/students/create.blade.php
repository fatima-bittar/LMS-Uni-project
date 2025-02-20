@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('grades.sections.students.index' ,[$grade->id, $section->id])}}" class="btn btn-light mb-3" style="position: absolute; top: 10px; left: 10px; text-decoration: none;">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    <h1>Add Student to {{ $section->name }} ({{ $grade->name }})</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('grades.sections.students.store', [$grade->id, $section->id]) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Student</button>
        <a href="{{ route('grades.sections.students.index', [$grade, $section]) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
