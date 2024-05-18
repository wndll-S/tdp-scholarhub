<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admin extends Model
{
    use HasFactory;
    public function generated_report(): HasMany
    {
        return $this->hasMany(GeneratedReport::class, 'admin_id');
    }
    public function log():HasMany
    {
        return $this->hasMany(Log::class, 'admin_id');
    }
    public function announcement(): HasMany
    {
        return  $this->hasMany(Announcement::class, 'announcement_id');
    }
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'username',
        'email_address',
        'password',
        'role',
        'status',
        'created_at',
        'updated_at',
    ];
}
