<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'employee_attendance_code',
        'ip_address',
        'time_in',
        'time_out',
        'status',
    ];

public function user(){
    return $this->belongsTo(User::class);
}
} 
