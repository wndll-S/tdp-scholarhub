<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementRecipient extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }
    protected $fillable = [
        'id',
        'announcement_id',
        'student_id',
        'status',
        'created_at',
        'updated_at',
    ];
}
