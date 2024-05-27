<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAddress extends Model
{
    use HasFactory, Uuids;
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'student_id',
        'barangay',
        'city_town',
        'district',
        'zip_code',
    ];
}
