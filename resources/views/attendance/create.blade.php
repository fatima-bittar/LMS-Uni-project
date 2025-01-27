@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Attendance</h2>
        <form action="{{ route('attendance.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="student_id">Student</label>
                <input type="text" name="student_id" id="student_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="present">Present</option>
                    <option value="absent">Absent</option>
                    <option value="late">Late</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Record Attendance</button>
        </form>
    </div>
@endsection
