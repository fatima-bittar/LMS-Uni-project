@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-end mb-3">
        <!-- Logout Button with Icon -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
    <!-- Grades Table -->
    <h2>Grades</h2>
    <a href="{{ route('grades.create') }}" class="btn btn-primary mb-3">Add New Grade</a>

    <table class="table">
        <thead>
            <tr>
                <th>Grade Name</th>
                <th>Manage Sections</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grades as $grade)
                <tr>
                    <td>{{ $grade->name }}</td>
                    <td>
                        <a href="{{ route('grades.sections.index', $grade->id) }}" class="btn btn-info btn-sm">Manage Sections</a>
                    </td>
                    <td>
                        <a href="{{ route('grades.edit', $grade) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('grades.destroy', $grade) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
