@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('grades.index') }}" class="btn btn-light mb-3" style="position: absolute; top: 10px; left: 10px; text-decoration: none;">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    <h2>Edit Grade</h2>
    <form action="{{ route('grades.update', $grade) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Grade Name</label>
            <input type="text" name="name" class="form-control mt-1" value="{{ $grade->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Grade</button>
    </form>
</div>
@endsection
