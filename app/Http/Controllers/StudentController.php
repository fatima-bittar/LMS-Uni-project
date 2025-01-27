<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller

{
        public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function index(Grade $grade, Section $section)
    {
        $students = $section->students;
        return view('sections.students.index', compact('grade', 'section', 'students'));
    }

    public function create(Grade $grade, Section $section)
    {
        return view('sections.students.create', compact('grade', 'section'));
    }

    public function store(Request $request, Grade $grade, Section $section)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone_number' => 'required|string|max:15',
        ]);

        $section->students()->create($request->all());

        return redirect()->route('grades.sections.students.index', [$grade->id, $section->id])
            ->with('success', 'Student added successfully!');
    }

    public function edit(Grade $grade, Section $section, Student $student)
    {
        return view('sections.students.edit', compact('grade', 'section', 'student'));
    }

    public function update(Request $request, Grade $grade, Section $section, Student $student)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone_number' => 'required|string|max:15',
        ]);

        $student->update($request->all());

        return redirect()->route('grades.sections.students.index', [$grade->id, $section->id])
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(Grade $grade, Section $section, Student $student)
    {
        $student->delete();

        return redirect()->route('grades.sections.students.index', [$grade->id, $section->id])
            ->with('success', 'Student deleted successfully!');
    }
}


