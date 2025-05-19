<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamMark extends Model
{
    use HasFactory;
    protected $fillable =[
        'mideterm_exam_marks',
        'final_exam_marks',
        'attendence_marks',
        'class_talent_marks',
        'totale_marks',
        'passing_state',
        'semester',
        'student_id',
        'subject_id',
        'exam_chance_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function exam_chance(){
        return $this->belongsTo(ExamChances::class);
    }
}
