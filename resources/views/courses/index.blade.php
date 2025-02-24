@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Courses</h1>
        <ul>
            @foreach ($courses as $course)
                <li>
                    <strong>{{ $course->name }}</strong><br>
                    <p>{{ $course->description }}</p>
                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('courses.create') }}" class="btn btn-success">Create a new course</a>
    </div>
@endsection
