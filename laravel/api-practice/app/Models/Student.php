<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'grade',
        'school_id',
    ];

    // define a relationship between students and schools
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
