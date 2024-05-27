<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Traits\Uuids;
class Student extends Model
{
    use HasFactory;
    use Uuids;

    public function applications(): HasOne
    {
        return $this->hasOne(Application::class, 'student_id');
    }
    public function student_address(): HasOne
    {
        return $this->hasOne(StudentAddress::class, 'student_id');
    }
    public function family_background(): HasOne
    {
        return $this->hasOne(FamilyBackground::class, 'student_id');
    }
    public function login_detail(): HasOne
    {
        return $this->hasOne(LoginDetail::class, 'student_id');
    }
    public function documents(): HasOne
    {
        return $this->hasOne(Document::class, 'student_id');
    }
    public function education_detail(): HasOne
    {
        return $this->hasOne(EducationDetail::class, 'student_id');
    }
    public function announcement_recipient(): HasMany
    {
        return $this->hasMany(AnnouncementRecipient::class, 'student_id');
    }
    public $timestamps = true;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'name_ext',
        'birthday',
        'birth_place',
        'sex',
        'civil_status',
        'citizenship',
        'ip_affiliation',
    ];
}
