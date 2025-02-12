<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'duration', 'fee_per_month'];

    public function students()
    {
        return $this->hasMany(Student::class, 'course_id');
    }
}
