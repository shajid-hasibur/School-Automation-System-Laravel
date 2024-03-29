<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountStudentFee extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
    public function student_class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }
    public function student_section()
    {
        return $this->belongsTo(StudentSection::class, 'section_id', 'id');
    }
    public function student_year()
    {
        return $this->belongsTo(StudentYear::class, 'year_id', 'id');
    }
    public function student_shift()
    {
        return $this->belongsTo(StudentShift::class, 'shift_id', 'id');
    }
    public function discount()
    {
        return $this->belongsTo(DiscountStudent::class, 'id', 'assign_student_id');
    }
    public function group()
    {
        return $this->belongsTo(StudentGroup::class, 'group_id', 'id');
    }
    public function fee_category()
    {
        return $this->belongsTo(FeeCategory::class, 'fee_category_id', 'id');
    }
    public function assigned_student()
    {
        return $this->belongsTo(AssignStudent::class, 'student_id', 'student_id');
    }
    public function exam_type()
    {
        return $this->belongsTo(ExamType::class, 'exam_type_id', 'id');
    }
}
