<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',



    ];
    public function teachers() : HasMany
    {
        return $this->hasMany(Teacher::class);
    }
    public function subjects(){
        return $this->hasMany(Subject::class);
    }
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function fees(){
        return $this->hasOne(Fees::class);
    }
    public function sessions() : HasMany
    {
        return $this->hasMany(Session::class);
    }
      public function register()
    {
        return $this->hasOne(RegisteredStudent::class);
    }
    public function details()
    {
        return $this->hasOne(StudentDetails::class);
    }
    // public function shift(){
    //     return $this->belongsTo(Shift::class);
    // }
    // public function student()
    // {
    //   return  $this->hasOne(Student::class);
    // }

}
