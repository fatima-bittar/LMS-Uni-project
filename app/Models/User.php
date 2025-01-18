<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'picture',
        'role',
    ];

    public function attendanceRecords()
    {
        return $this->hasMany(AttendanceRecord::class, 'taken_by_id');
    }
}
