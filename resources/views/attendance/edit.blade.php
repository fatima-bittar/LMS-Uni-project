@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Attendance for {{ $attendanceRecord->student->first_name }} {{ $attendanceRecord->student->last_name }} on {{ \Carbon\Carbon::parse($date)->format('l, jS F Y') }}</h2>

    <form action="{{ route('grades.sections.students.attendance.update', [$gradeId, $sectionId, $studentId, $date]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="attendance">Attendance:</label>
            <select name="attendance" id="attendance" class="form-control">
                <option value="present" {{ $attendanceRecord->attendance == 'present' ? 'selected' : '' }}>Present</option>
                <option value="absent" {{ $attendanceRecord->attendance == 'absent' ? 'selected' : '' }}>Absent</option>
                <option value="late" {{ $attendanceRecord->attendance == 'late' ? 'selected' : '' }}>Late</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Attendance</button>
    </form>
</div>
@endsection
