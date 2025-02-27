<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'class_id',
        'max_size',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function class()
    {
        return $this->belongsTo(Grade::class);
    }
}
