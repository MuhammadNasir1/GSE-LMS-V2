<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollUnits extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'assignment_id',
        'reference_no',
        'checked_status',
        'submission_count',
        'rejected_count',
    ];
    private $timestamp  = true;


}
