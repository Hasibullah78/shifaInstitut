<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'std_name',
        'std_e_name',
        'std_f_name',
        'std_f_e_name',
        'std_g_f_name',
        'c_province',
        'c_distirct',
        'c_vallage',
        'o_province',
        'o_district',
        'o_vallage',
        'r_date',
        'nic',
        'school',
        'phone',
        'g_date',
        'dob',
        'email',
        'gender',
        'reg_fees',
        'image',
        'blood_group',
        'exam_id',
        'serial_number',
        'exam_date',
        'semester',
        'passing_state',
        'department_id',
        'session_id'

    ];
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function session(){
        return $this->belongsTo(Session::class);
    }
    public function exam_marks(){
        return $this->hasMany(ExamMark::class);
    }

    // public function department()
    // {
    //     return $this->belongsTo(Department::class);
    // }

    // public function oldaddress()
    // {
    //     return $this->belongsTo(Oldaddress::class);
    // }
    // public function currentaddress()
    // {
    //     return $this->belongsTo(Currentaddress::class);
    // }

}
