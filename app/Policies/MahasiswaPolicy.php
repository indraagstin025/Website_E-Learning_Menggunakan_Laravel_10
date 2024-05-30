<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DataMahasiswa;

class MahasiswaPolicy
{
    
    public function view(User $user, DataMahasiswa $mahasiswa)
    {
        return $user->id === $mahasiswa->user_id || 
               in_array($user->role, ['admin', 'instructor']); // Izinkan admin dan instructor
    }
}
