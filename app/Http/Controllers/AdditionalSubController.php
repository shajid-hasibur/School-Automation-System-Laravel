<?php

namespace App\Http\Controllers;

use App\Models\AssignStudent;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentGroup;

class AdditionalSubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.setup.additional_subject.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        $data['groups'] = StudentGroup::all();
        return view('backend.setup.additional_subject.create',$data);
    }

    public function search(Request $request){
        $students = AssignStudent::with(['student','group','student_class'])
        ->where('class_id',$request->class_id)
        ->where('year_id',$request->year_id)
        ->where('group_id',$request->group_id)
        ->get();
        // dd($students);
        return response()->json($students);
    }

    // public function getSubject(){
    //     $subjects = SchoolSubject::all();
    //     return response()->json($subjects);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'add_subject_id' => 'required'
        ],

        [
            'add_subject_id.required' => 'Please select a subject before submit'
        ]);

        $student = AssignStudent::where('student_id', $request->student_id)->first();
        $student->add_subject_id = $request->add_subject_id;
        $student->save();
        // dd($student);
        $notification = array(
            'message' => 'Additional subject assigned Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student_data = AssignStudent::with(['student','group','student_class','student_year','student_section','student_shift','subject'])
        ->where('student_id',$id)
        ->first();

        $additional_subjects = SchoolSubject::where('flag',1)->get();

        return view('backend.setup.additional_subject.student-view',compact('student_data','additional_subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
