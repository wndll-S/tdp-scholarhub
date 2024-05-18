<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    protected $fillable = [
        'id',
        'admin_id',
        'created_at',
        'updated_at',
    ];
}
