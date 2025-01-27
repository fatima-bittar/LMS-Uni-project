@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Admin Dashboard</h2>

    <div class="row">
        <div class="col-md-4">
            <h3>Grades</h3>
            <ul>
                <li><a href="{{ route('grades.index') }}">View Grades</a></li>
                <!-- Pass the grade ID to the route for sections -->
                <li><a href="{{ route('grades.sections.index', $grade) }}">Manage Sections</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
