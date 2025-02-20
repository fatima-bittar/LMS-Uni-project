@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ route('grades.sections.index' ,$grade->id)}}" class="btn btn-light mb-3" style="position: absolute; top: 10px; left: 10px; text-decoration: none;">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    <h2>Students in Section: {{ $section->name }} - {{ $grade->name }}</h2>
    <a href="{{ route('grades.sections.students.create', [$grade,$section]) }}" class="btn btn-primary">Add New Student</a>
    
    <!-- Table for displaying students -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone_number }}</td>
                    <td>
                        <a href="{{ route('grades.sections.students.attendance.index', [$grade->id, $section->id]) }}" class="btn btn-info">
                            Take Attendance
                        </a>                
                        <a href="{{ route('grades.sections.students.edit', [$grade->id, $section->id, $student->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('grades.sections.students.destroy', [$grade->id, $section->id, $student->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
