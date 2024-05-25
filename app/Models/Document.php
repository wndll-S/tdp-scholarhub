<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
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
        'id',
        'student_id',
        'school_id',
        'document_type',
        'file_path',
        'created_at',
        'updated_at',
    ];
}
