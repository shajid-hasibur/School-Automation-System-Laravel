<?php

namespace App\Http\Requests;

use App\Models\Lesson;
use App\Rules\LessonTimeAvailabilityRule;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateLessonRequest extends FormRequest
{
    public function rules()
    {
        return [
            'class_id'   => [
                'required',
                'integer'],
            'teacher_id' => [
                'required',
                'integer'],
            'weekday'    => [
                'required',
                'integer',
                'min:1',
                'max:7'],
            'start_time' => [
                'required',
                new LessonTimeAvailabilityRule($this->route('lesson')->id),
                'date_format:' . config('panel.lesson_time_format')],
            'end_time'   => [
                'required',
                'after:start_time',
                'date_format:' . config('panel.lesson_time_format')],
        ];
    }
}
