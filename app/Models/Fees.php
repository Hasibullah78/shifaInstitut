<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    use HasFactory;
    protected $fillable = [
        'fees_amount',
        'fees_type',
        'department_id'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
