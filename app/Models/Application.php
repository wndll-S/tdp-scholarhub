<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'student_id',
        'status',
        'ranking_pts',
        'created_at',
        'updated_at',
    ];
}
