<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentSection;
use Illuminate\Http\Request;

class StudentSectionController extends Controller
{
    public function StudentSectionView()
    {
        $studentSections = StudentSection::all();
        return view('backend.setup.student_section.view_section', compact('studentSections'));
    }

    public function StudentSectionCreate()
    {
        return view('backend.setup.student_section.create_section');
    }

    public function StudentSectionStore(Request $request)
    {
        $request->validate([
            'section_name' => 'required|unique:student_sections,section_name',
            // 'Section_start_time' => 'required',
            // 'Section_end_time' => 'required',
        ]);
        $studentSection = new StudentSection();
        $studentSection->section_name = $request->section_name;
        // $Section->Section_start_time = $request->Section_start_time;
        // $Section->Section_end_time = $request->Section_end_time;
        $studentSection->save();
        $notification = array(
            'message' => 'Student Section Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.section.view')->with($notification);
    }

    public function StudentSectionEdit($id)
    {
        $studentSection = StudentSection::find($id);
        return view('backend.setup.student_section.edit_section', compact('studentSection'));
    }

    public function StudentSectionUpdate(Request $request, $id)
    {
        $studentSection = StudentSection::find($id);
        $request->validate([
            'section_name' => 'required|unique:student_sections,section_name,' . $id,
            // 'Section_start_time' => 'required',
            // 'Section_end_time' => 'required',
        ]);
        
        $studentSection->section_name = $request->section_name;
        // $Section->section_start_time = $request->section_start_time;
        // $Section->section_end_time = $request->section_end_time;
        $studentSection->save();
        $notification = array(
            'message' => 'Student Section Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.section.view')->with($notification);
    }

    public function StudentSectionDelete($id)
    {
        $studentSection = StudentSection::find($id);
        $studentSection->delete();
        $notification = array(
            'message' => 'Student Section Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.section.view')->with($notification);
    }
}
