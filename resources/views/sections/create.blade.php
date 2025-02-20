@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ route('grades.sections.index' ,$grade->id)}}" class="btn btn-light mb-3" style="position: absolute; top: 10px; left: 10px; text-decoration: none;">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    <h2>Add New Section</h2>
    <form action="{{ route('grades.sections.store', $grade->id) }}" method="POST">
        @csrf
        <input type="hidden" name="grade_id" value="{{ $grade->id }}">
        <div class="form-group">
            <label for="name">Section Name</label>
            <input type="text" name="name" class="form-control" required>
            
            <label for="name">Max size of students</label>
            <input type="number" name="max_size" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Save Section</button>
    </form>
</div>
@endsection
