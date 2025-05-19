<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'std_name',
        'std_f_name',
        'std_g_f_name',
        'c_province',
        'c_distirct',
        'c_vallage',
        'o_province',
        'o_district',
        'o_vallage',
        'nic',
        'school',
        'phone',
        'g_date',
        'dob',
        'email',
        'gender',
        'image',
        'exam_register_number',
        'exam_id',
        'exam_date',
        'department_id',
        'session_id'
    ];
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function session(){
        return $this->belongsTo(Session::class);
    }
}
