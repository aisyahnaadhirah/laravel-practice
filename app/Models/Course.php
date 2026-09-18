<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $connection = 'pgsql';
    protected $fillable = [
        'course_name',
    ];

    public function students(){
        return $this->hasMany(Student::class);  //1 course boleh ada banyak student
    }
}
