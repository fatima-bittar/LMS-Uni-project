@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('grades.sections.index' ,$grade->id)}}" class="btn btn-light mb-3" style="position: absolute; top: 10px; left: 10px; text-decoration: none;">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    <h2>Attendance for Section: {{ $section->name }} (Grade: {{ $grade->name }})</h2>

    <!-- Display the current date -->
    <p>Date: {{ \Carbon\Carbon::today()->format('l, jS F Y') }}</p>

    <!-- Form for taking attendance -->
    <form id="attendance-form" action="{{ route('grades.sections.students.attendance.store', [$grade->id, $section->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="attendance_date" value="{{ \Carbon\Carbon::today()->format('Y-m-d') }}">

        <table class="table" id="attendance-table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Present</th>
                    <th>Absent</th>
                    <th>Late</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>
                            <input type="radio" name="attendance[{{ $student->id }}]" value="present"
                                   @if($student->attendanceRecords->where('date', \Carbon\Carbon::today()->format('Y-m-d'))->first()?->attendance == 'present') checked @endif>
                        </td>
                        <td>
                            <input type="radio" name="attendance[{{ $student->id }}]" value="absent"
                                   @if($student->attendanceRecords->where('date', \Carbon\Carbon::today()->format('Y-m-d'))->first()?->attendance == 'absent') checked @endif>
                        </td>
                        <td>
                            <input type="radio" name="attendance[{{ $student->id }}]" value="late"
                                   @if($student->attendanceRecords->where('date', \Carbon\Carbon::today()->format('Y-m-d'))->first()?->attendance == 'late') checked @endif>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Save button, initially hidden -->
        <button id="save-attendance-btn" type="submit" class="btn btn-primary" style="visibility: hidden; margin-left: auto; display: flex;">Save</button>
    </form>

    <h3>Attendance History</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                @foreach ($student->attendanceRecords as $attendance)
                    <tr>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($attendance->date)->format('jS F Y') }}</td>
                        <td>{{ ucfirst($attendance->attendance) }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>

<!-- JavaScript to track changes -->
<script>
    const attendanceForm = document.getElementById('attendance-form');
    const saveButton = document.getElementById('save-attendance-btn');
    let originalAttendance = {};

    // Store the initial state of attendance
    document.querySelectorAll('input[name^="attendance"]').forEach(input => {
        originalAttendance[input.name] = input.checked ? input.value : '';
    });

    // Check for changes to the form
    attendanceForm.addEventListener('change', function() {
        let hasChanges = false;

        // Check if any attendance value has changed
        document.querySelectorAll('input[name^="attendance"]').forEach(input => {
            if (input.checked && input.value !== originalAttendance[input.name]) {
                hasChanges = true;
            }
        });

        // Show or hide the save button based on whether there are changes
        if (hasChanges) {
            saveButton.style.visibility = 'visible';
        } else {
            saveButton.style.visibility = 'hidden';
        }
    });
</script>

@endsection
