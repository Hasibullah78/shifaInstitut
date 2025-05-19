<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamChances extends Model
{

    use HasFactory;
    protected $fillable = [
        'chance_type',
    ];


public function exam_marks(){
return $this->hasOne(ExamMark::class);
}

}
