@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Grades</h2>
    <a href="{{ route('grades.create') }}" class="btn btn-primary">Add New Grade</a>
    <ul>
        @foreach ($grades as $grade)
            <li>
                {{ $grade->name }}

                <!-- Link to Manage Sections -->
                <a href="{{ route('grades.sections.index', $grade->id) }}" class="btn btn-info btn-sm">Manage Sections</a>

                <a href="{{ route('grades.edit', $grade) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('grades.destroy', $grade) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
