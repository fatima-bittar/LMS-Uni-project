<?php
namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    // Display sections for a specific grade
    public function index(Grade $grade)
    {
        // Get sections related to the passed grade
        $sections = $grade->sections;
        
        // Return the index view with sections and the grade
        return view('sections.index', compact('sections', 'grade'));
    }

    // Show form to create a new section for a specific grade
    public function create(Grade $grade)
    {
        return view('sections.create', compact('grade'));
    }

    // Store a new section for a specific grade
    public function store(Request $request, Grade $grade)
    {
        // Validate the input (the name is required)
        $request->validate([
            'name' => 'required|string|max:255',
            'max_size' => 'required|integer',
        ]);

        // Create the new section and associate it with the grade
        $grade->sections()->create($request->all());

        // Redirect to the sections index for that grade
        return redirect()->route('grades.sections.index', $grade)->with('success', 'Section created successfully!');
    }

    // Show the form to edit an existing section
    public function edit(Grade $grade, Section $section)
    {
        return view('sections.edit', compact('grade', 'section'));
    }

    // Update an existing section for a specific grade
    public function update(Request $request, Grade $grade, Section $section)
    {
        // Validate the input (name is required)
        $request->validate([
            'name' => 'required|string|max:255',
            'max_size' => 'required|integer',

        ]);

        // Update the section with the new data
        $section->update($request->all());
        

        // Redirect back to the sections index for the grade
        return redirect()->route('grades.sections.index',  ['grade' => $section->grade_id])->with('success', 'Section updated successfully!');
    }

    // Delete a section for a specific grade
    public function destroy(Grade $grade, Section $section)
    {
        // Delete the section
        $section->delete();

        // Redirect to the sections index for that grade
        return redirect()->route('grades.sections.index',  ['grade' => $section->grade_id])->with('success', 'Section deleted successfully!');
    }
}
