<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $connection = 'pgsql';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'course_id',
    ];

    public function course(){
        return $this->belongsTo(Course::class); //student belongs to course and course has many students
    }
}
