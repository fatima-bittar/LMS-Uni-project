@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('grades.index') }}" class="btn btn-light mb-3" style="position: absolute; top: 10px; left: 10px; text-decoration: none;">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    <h2>Add New Grade</h2>
    <form action="{{ route('grades.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Grade Name</label>
            <input type="text" name="name" class="form-control mt-1" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save Grade</button>
    </form>
</div>
@endsection
