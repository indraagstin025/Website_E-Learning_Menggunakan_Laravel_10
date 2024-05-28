<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UproleController extends Controller
{
    public function update(Request $request, $id)
{
    $data = User::find($id);
    $data->role = $request->role; // Ambil role dari request
    $data->save();
    return redirect('/usercontrol')->with('success', 'Berhasil Mengubah Role.');
}

}
