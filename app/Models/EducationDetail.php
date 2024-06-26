<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function school()
    {
        return $this->belongsTo(School::class);
    }
    protected $fillable = [
        'student_id',
        'school_id',
        'lrn',
        'course',
        'major',
        'year_level',
    ];
}
