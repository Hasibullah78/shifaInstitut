<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Session extends Model
{
    protected $fillable = [
        'session_category',
        'department_id'
    ];
    use HasFactory;
    public function department():BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    public function student()
    {
        return $this->hasOne(Student::class);
    }



}
