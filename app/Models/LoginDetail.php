<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginDetail extends Model
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
        'email_address',
        'mobile_number',
        'password',
        'created_at',
        'updated_at',
    ];
}
