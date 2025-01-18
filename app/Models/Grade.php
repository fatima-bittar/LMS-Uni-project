<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeModel extends Model
{
    use HasFactory;

    protected $table = 'grades';

    protected $fillable = [
        'name',
    ];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
