<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Announcement extends Model
{
    use HasFactory;
    public function announcement_recipient(): HasOne
    {
        return $this->hasOne(AnnouncementRecipient::class, 'announcement_id');
    }
    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    protected $fillable = [
        'id',
        'admin_id',
        'school_id',
        'title',
        'message',
        'is_for_all',
        'created_at',
        'updated_at',
    ];
}
