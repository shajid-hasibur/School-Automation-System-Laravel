<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Lesson;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use App\Models\User;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    //
    public function index()
    {

        $lessons = Lesson::all();

        return view('backend.setup.lesson.index', compact('lessons'));
    }

    public function create()
    {
        $classes = StudentClass::all()->pluck('name', 'id');
        $subjects = SchoolSubject::all()->pluck('name', 'id');

        $teachers = User::where('usertype', 'teacher')->pluck('name', 'id');

        return view('backend.setup.lesson.create', compact('classes', 'teachers', 'subjects'));
    }

    public function store(StoreLessonRequest $request)
    {
        // dd($request->all());
        $lesson = Lesson::create($request->all());

        return redirect()->route('lessons.index');
    }

    public function edit(Lesson $lesson)
    {
        $classes = StudentClass::all()->pluck('name', 'id');
        $subjects = SchoolSubject::all()->pluck('name', 'id');
        $teachers = User::where('usertype', 'teacher')->pluck('name', 'id');

        $lesson->load('class', 'teacher', 'subject');

        return view('backend.setup.lesson.edit', compact('classes', 'teachers', 'lesson','subjects'));
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $lesson->update($request->all());

        return redirect()->route('lessons.index');
    }

    public function show(Lesson $lesson)
    {
        $lesson->load('class', 'teacher');

        return view('backend.setup.lesson.show', compact('lesson'));
    }

    public function delete(Request $request, $id)
    {
        $lesson = Lesson::find($id);

        $lesson->forceDelete();

        return back();
    }

    // public function massDestroy(MassDestroyLessonRequest $request)
    // {
    //     Lesson::whereIn('id', request('ids'))->delete();

    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}
