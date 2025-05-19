<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'l_name',
        'f_name',
        'image',
        'dob',
        'phone',
        'province',
        'district',
        'rank',
        'department_id',


    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}
