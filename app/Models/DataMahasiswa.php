<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMahasiswa extends Model
{
    use HasFactory;
    public $table = 'datamahasiswa';
    public $fillable = [
        'user_id',
        'nama_lengkap',
        'email',
        'nim',
        'angkatan',
        'jurusan',
        'tanggal_lahir',
    ];
}
