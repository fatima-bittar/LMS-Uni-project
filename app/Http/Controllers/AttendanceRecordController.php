<?php

namespace App\Http\Controllers;

use App\Models\AttendanceRecord;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceRecordController extends Controller
{
    // Display the student list for taking attendance
    public function index($gradeId, $sectionId)
    {
        $grade = Grade::findOrFail($gradeId);
        $section = Section::findOrFail($sectionId);

        // Fetch the students in the selected section
        $students = Student::where('section_id', $sectionId)->get();

        return view('attendance.index', compact('grade', 'section', 'students'));
    }

    // Store the attendance records
    public function store(Request $request, $gradeId, $sectionId)
    {
        $date = $request->input('attendance_date');  // The date for the attendance record
    
        // Loop through each student's attendance and store it
        foreach ($request->input('attendance') as $studentId => $attendanceStatus) {
            // Check if attendance has already been taken for this student on the given date
            $existingAttendance = AttendanceRecord::where('student_id', $studentId)
                                                  ->where('date', $date)
                                                  ->first();
    
            // If attendance already exists, don't allow a second entry
            if ($existingAttendance) {
                
    // Update the attendance status
    $existingAttendance->attendance = $attendanceStatus;
    $existingAttendance->save();
            } else {

                // Insert the attendance record for each student
                AttendanceRecord::create([
                    'date' => $date,
                    'student_id' => $studentId,
                    'attendance' => $attendanceStatus,  // Attendance status (e.g., present, absent, late)
                    'taken_by_id' => auth()->user()->id,
                ]);
            }
        }
    
        // Redirect back with a success message
        return redirect()->route('grades.sections.students.attendance.index', [$gradeId, $sectionId])
                         ->with('success', 'Attendance recorded successfully');
    }

    // Display the form to edit the attendance for a student
public function edit($gradeId, $sectionId, $studentId, $date)
{
    // Get the attendance record for the student on this date
    $attendanceRecord = AttendanceRecord::where('student_id', $studentId)
                                       ->where('date', $date)
                                       ->first();

    // If attendance record exists, pass it to the view
    return view('attendance.edit', compact('attendanceRecord', 'gradeId', 'sectionId', 'studentId', 'date'));
}

// Update the attendance record
public function update(Request $request, $gradeId, $sectionId, $studentId, $date)
{
    // Get the attendance record for the student on this date
    $attendanceRecord = AttendanceRecord::where('student_id', $studentId)
                                       ->where('date', $date)
                                       ->first();

    // Update the attendance status
    $attendanceRecord->attendance = $request->input('attendance');
    $attendanceRecord->save();

    // Redirect back to the attendance index with a success message
    return redirect()->route('grades.sections.students.attendance.index', [$gradeId, $sectionId])
                     ->with('success', 'Attendance updated successfully');
}

    
}
