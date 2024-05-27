<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Solo crearemos el método delete para borrar un usuario
    public function delete($userId)
    {
        // Borrar el usuario
        $user = User::findOrFail($userId);
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado correctamente.'], 200);
    }

}
