<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMahasiswa extends Model
{
    use HasFactory;
    public $table = 'datamahasiswa';
    public $fillable = [
        'name',
        'email',
        'nim',
        'angkatan',
        'jurusan',
    ];
}
