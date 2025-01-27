@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Sections for Grade: {{ $grade->name }}</h2>
    <a href="{{ route('grades.sections.create', $grade->id) }}" class="btn btn-primary">Add New Section</a>
    <ul>
        @foreach ($sections as $section)
            <li>
                {{ $section->name }}
                <a href="{{ route('grades.sections.students.index', [$grade ->id, $section->id]) }}">View Students</a>
                <a href="{{ route('grades.sections.students.attendance.index', [$grade->id, $section->id]) }}" 
                    class="btn btn-success">
                     Take Attendance
                 </a>
                <a href="{{ route('sections.edit', [$grade ->id, $section->id]) }}">Edit</a>
                <form action="{{ route('sections.destroy', [$grade->id, $section->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
