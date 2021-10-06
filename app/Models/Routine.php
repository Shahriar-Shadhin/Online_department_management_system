<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;


class Routine extends Model
{
    use HasFactory;
    protected $fillable = ['course_code', 'teacher_id', 'times', 'days', 'rooms'];
    
    public function course()
    {
        return $this->hasOne(Course::class, 'course_code', 'course_code');
    }

}
