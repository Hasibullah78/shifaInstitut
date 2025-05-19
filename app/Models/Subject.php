<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'credit',
        'semester',
        'subject_code',
        'department_id',

    ];


    use HasFactory;
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function exam_marks(){
        return $this->hasOne(ExamMark::class);
    }
}
