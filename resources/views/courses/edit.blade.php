@extends('layouts.app')

@section('content')
    <h1>Edit Course</h1>
    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Course Name:</label>
        <input type="text" name="name" id="name" value="{{ $course->name }}" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required>{{ $course->description }}</textarea>
        <button type="submit">Update</button>
    </form>
@endsection
