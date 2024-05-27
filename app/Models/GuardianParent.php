<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuardianParent extends Model
{
    use HasFactory;
    public function family_background()
    {
        return $this->belongsTo(FamilyBackground::class);
    }
    protected $fillable = [
        'family_background_id',
        'first_name',
        'middle_name',
        'last_name',
        'address',
        'contact_number',
        'occupation',
        'employer_name',
        'employer_address',
        'annual_gross_income',
        'status',
        'relationship',
    ];
}
