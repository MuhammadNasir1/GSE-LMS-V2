<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
protected $primaryKey = 'id'; 
protected $table = 'resources'; 
    protected $fillable = [
        'resource_file',
        'resource_name',
        'course',
        'course_assignments',
        'description',
    ];

    public $timestamp = true;

}
