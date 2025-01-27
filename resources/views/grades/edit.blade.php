@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Grade</h2>
    <form action="{{ route('grades.update', $grade) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Grade Name</label>
            <input type="text" name="name" class="form-control" value="{{ $grade->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Grade</button>
    </form>
</div>
@endsection
