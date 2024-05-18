<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class School extends Model
{
    use HasFactory;
    public function document(): HasMany
    {
        return $this->hasMany(Document::class,'school_id');
    }
    public function announcement():HasMany
    {
        return $this->hasMany(Announcement::class, 'school_id');
    }
    public function education_detail(): HasOne
    {
        return $this->hasOne(EducationDetail::class, 'school_id');
    }
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'name',
        'address',
        'school_type',
        'email_address',
        'contact_number',
        'password',
        'created_at',
        'updated_at',
    ];
}
