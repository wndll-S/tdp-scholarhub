<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FamilyBackground extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function guardian_parent(): HasMany
    {
        return $this->hasMany(GuardianParent::class, 'family_background_id');
    }
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'student_id',
        'total_gross_income',
        'number_of_siblings',
        'created_at',
        'updated_at',
    ];
}
