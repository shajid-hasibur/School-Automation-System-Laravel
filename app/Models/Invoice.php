<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public function assign_student(){
       return $this->belongsTo(AssignStudent::class,'student_id','student_id');
    }

    public function fee_category(){
        return $this->belongsTo(FeeCategory::class,'fee_category_id','id');
    }
    public function exam_name(){
        return $this->belongsTo(ExamType::class,'exam_type_id','id');
    }
}
