@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('grades.index') }}" class="btn btn-light mb-3" style="position: absolute; top: 10px; left: 10px; text-decoration: none;">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    
    <h2>Sections for : {{ $grade->name }}</h2>
    <a href="{{ route('grades.sections.create', $grade->id) }}" class="btn btn-primary mb-3">Add New Section</a>
    
    <!-- Table for displaying sections -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Section Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sections as $section)
                <tr>
                    <td>{{ $section->name }}</td>
                    <td>
                        <!-- View Students Button -->
                        <a href="{{ route('grades.sections.students.index', [$grade->id, $section->id]) }}" class="btn btn-info btn-sm">View Students</a>
                        
                        <!-- Take Attendance Button -->
                        <a href="{{ route('grades.sections.students.attendance.index', [$grade->id, $section->id]) }}" class="btn btn-success btn-sm">Take Attendance</a>
                        
                        <!-- Edit Button -->
                        <a href="{{ route('sections.edit', [$grade->id, $section->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <!-- Delete Form -->
                        <form action="{{ route('sections.destroy', [$grade->id, $section->id]) }}" method="POST" style="display:inline;">
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
