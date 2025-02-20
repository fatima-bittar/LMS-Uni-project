@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $course->name }}</h1>
        <p>{{ $course->description }}</p>
        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection
