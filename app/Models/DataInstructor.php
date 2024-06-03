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
        'nama_lengkap',
        'email',
        'nidn',
        'departemen',
        'tanggal_lahir',
        'alamat',
        'provinsi',
        'kecamatan',
        'kota_kabupaten',
        'kode_pos',
       
    ];

   
}
