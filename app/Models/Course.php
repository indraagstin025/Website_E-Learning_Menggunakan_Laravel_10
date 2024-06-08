<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public $table = 'courses';
    public $fillable = [
        'name',
        'deskripsi',
        'file',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'course_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'enrollments');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_user');
    }
}
