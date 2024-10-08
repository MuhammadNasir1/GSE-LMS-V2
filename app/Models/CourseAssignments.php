<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAssignments extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'optional',
        'refrence_no',
        'title',
        'credits',
        'progress',
    ];
    protected $timestamp = true;
}
