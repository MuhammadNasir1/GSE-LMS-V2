<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public $table = 'courses';
    protected $fillable = [
        'user_id',
        'name',
        'assessor_id',
        'qualification_number',
        'with_optional',
        'total_assignments',
        'mandatory_assignments',
        'optional_assignments',
        'option_selected',
        'course_assignments',
        'description',

    ];
    private $timestamp  = true;
    public function users()
    {
        return $this->hasMany(User::class, 'course', 'id');
    }
}
