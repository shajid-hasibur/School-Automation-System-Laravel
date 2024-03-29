<?php

namespace App\Http\Controllers\backend\Marks;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentMarks;
use App\Models\StudentSection;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarksController extends Controller
{
    //
    public function MarksAdd()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['sections'] = StudentSection::all();
        $data['exam_types'] = ExamType::all();
        $data['groups'] = StudentGroup::all();

        return view('backend.marks.marks_add', $data);
    }

    //Marks Get students
    public function GetStudents(Request $request)
    {
        // dd($request->all());
        $ssc_students = '';
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $section_id = $request->section_id;
        $assign_subject_id = $request->assign_subject_id;
        $exam_type_id = $request->exam_type_id;
        $group_id = $request->group_id;
    

        $markExists= StudentMarks::where('year_id', $year_id)->where('class_id', $class_id)->where('section_id', $section_id)->where('assign_subject_id', $assign_subject_id)->where('exam_type_id', $exam_type_id)->exists();
        // dd($markExists);
        if($class_id == 9 || $class_id == 10){
            $ssc_students = AssignStudent::with('student','student_class')
            ->where('year_id',$year_id)
            ->where('class_id',$class_id)
            ->where('section_id',$section_id)
            ->where('group_id',$group_id)
            ->get();
        }
       
        $students = AssignStudent::with(['student','student_class'])->where('year_id', $year_id)->where('class_id', $class_id)->where('section_id', $section_id)->get();
        // dd($students);
        if ($markExists != true) {
            return response()->json([
              'students' => $students,
              'ssc_students' => $ssc_students
            ]);
        } else {
            return response()->json([
                'result' => 'no',
            ]);
        }
    }

    //Check Marks existence
    public function MarksCheck(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $section_id = $request->section_id;
        $assign_subject_id = $request->assign_subject_id;
        $exam_type_id = $request->exam_type_id; 

        $marksValidation = StudentMarks::where('year_id', $year_id)->where('class_id', $class_id)->where('section_id', $section_id)->where('assign_subject_id', $assign_subject_id)->where('exam_type_id', $exam_type_id)->get();

        // dd( $marksValidation);

        if($marksValidation != null){
            $result = 1;
            return response()->json($result);
        } else {
            $result = 0;
            return response()->json($result);
        }
    }

    //
    public function MarksStore(Request $request)
    {
        $subjectid = AssignSubject::select('subject_id')->where('id',$request->assign_subject_id)->first();
         
        $idCount = count($request->student_id);
        $idArray = array();
        for($i = 0; $i < $idCount; $i++){ 
            $idArray[] = $request->student_id[$i];
        }
           
        $addSubId = AssignStudent::select('add_subject_id')->whereIn('student_id',$idArray)->get();
        
        $student_count = count($request->student_id);
        if ($student_count) {
            for ($i = 0; $i < $student_count; $i++) {
                $data = new StudentMarks();
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->class_id = $request->class_id;
                $data->section_id = $request->section_id;
                $data->year_id = $request->year_id;
                $data->assign_subject_id = $request->assign_subject_id;
                if($subjectid->subject_id == $addSubId[$i]['add_subject_id']) 
                {
                    $data->add_subject_id = $addSubId[$i]['add_subject_id'];
                }
                else
                {
                    $data->add_subject_id = null;
                }
                $data->exam_type_id = $request->exam_type_id;
                $data->descriptive_mark = $request->descriptive_mark[$i];
                $data->objective_mark = $request->objective_mark[$i];
                $data->practical_mark = $request->practical_mark[$i];
                $data->total_mark = $data->descriptive_mark+$data->objective_mark+$data->practical_mark;
                $data->save();
                  
            }
        }

        $notification = array(
            'message' => 'Marks Added Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('marks.entry.add')->with($notification);
    }

    //
    public function MarksEdit()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['sections'] = StudentSection::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.marks.marks_edit', $data);
    }

    //
    public function MarksEditGetStudents(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $section_id = $request->section_id;
        $assign_subject_id = $request->assign_subject_id;
        $exam_type_id = $request->exam_type_id;

        $students = StudentMarks::with(['student','student_class'])->where('year_id', $year_id)->where('class_id', $class_id)->where('section_id', $section_id)->where('assign_subject_id', $assign_subject_id)->where('exam_type_id', $exam_type_id)->get();
        // dd($students);
        return response()->json($students);
    }

    //
    public function MarksUpdate(Request $request)
    {
        $subjectid = AssignSubject::select('subject_id')->where('id',$request->assign_subject_id)->first();
         
        $idCount = count($request->student_id);
        $idArray = array();
        for($i = 0; $i < $idCount; $i++){ 
            $idArray[] = $request->student_id[$i];
        }
           
        $addSubId = AssignStudent::select('add_subject_id')->whereIn('student_id',$idArray)->get();

        StudentMarks::where('year_id', $request->year_id)->where('class_id', $request->class_id)->where('section_id', $request->section_id)->where('assign_subject_id', $request->assign_subject_id)->where('exam_type_id', $request->exam_type_id)->delete();
        $student_count = count($request->student_id);
        if ($student_count) {
            for ($i = 0; $i < $student_count; $i++) {
                $data = new StudentMarks();
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->class_id = $request->class_id;
                $data->year_id = $request->year_id;
                $data->section_id = $request->section_id;
                $data->assign_subject_id = $request->assign_subject_id;
                if($subjectid->subject_id == $addSubId[$i]['add_subject_id']) 
                {
                    $data->add_subject_id = $addSubId[$i]['add_subject_id'];
                }
                else
                {
                    $data->add_subject_id = null;
                }
                $data->exam_type_id = $request->exam_type_id;
                $data->descriptive_mark = $request->descriptive_mark[$i];
                $data->objective_mark = $request->objective_mark[$i];
                $data->practical_mark = $request->practical_mark[$i];
                $data->total_mark = $data->descriptive_mark+$data->objective_mark+$data->practical_mark;
                $data->save();
            }
        }
        $notification = array(
            'message' => 'Marks Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('marks.entry.edit')->with($notification);
    }
}
