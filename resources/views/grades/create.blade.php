@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Grade</h2>
    <form action="{{ route('grades.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Grade Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Grade</button>
    </form>
</div>
@endsection
