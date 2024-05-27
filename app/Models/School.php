<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class School extends Model
{
    use HasFactory;
    use Uuids;
    protected $table = 'schools';
    public function document(): HasOne
    {
        return $this->hasOne(Document::class,'school_id');
    }
    public function announcements():HasMany
    {
        return $this->hasMany(Announcement::class, 'school_id');
    }
    public function education_details(): HasMany
    {
        return $this->hasMany(EducationDetail::class, 'school_id');
    }

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'address',
        'school_type',
        'email_address',
        'contact_number',
        'password',
    ];
}
