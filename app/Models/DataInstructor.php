<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataInstructor extends Model
{
    use HasFactory;
    public $table = 'datainstructor';
    public $fillable = [
        'user_id',
        'name',
        'email',
        'nidn',
        'program_studi',
        'nama_lengkap',
        'tanggal_lahir',
        'profile_completed',
    ];
}
