<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        return response()->json(['message' => 'Inicio de sesión exitoso', 'user' => $user]);


        // Aquí agregamos el campo created_at al response
        return response()->json([
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at, // Añadimos la fecha de registro
            ],
        ]);
    }
}
