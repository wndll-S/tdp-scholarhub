<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratedReport extends Model
{
    use HasFactory;
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    protected $fillable = [
        'id',
        'admin_id',
        'report_name',
        'description',
        'created_at',
        'updated_at',
    ];
}
