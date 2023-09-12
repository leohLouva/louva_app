<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    
    public function createUser(Request $request)
    {
        echo "entramos al controlador";
        try {
            
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8',
            ]);
            $user = User::create($data);
            dd($data);
            $data['password'] = Hash::make($data['password']); // Hash de la contraseña
            
            // Puedes realizar otras acciones después de crear el usuario, como enviar un correo de confirmación, etc.
    
            //return redirect()->route('login')->with('success', 'Usuario registrado exitosamente');
            // ...
        } catch (\Exception $e) {
            // Manejo de errores, como registro de errores o redirección al formulario de registro
            return redirect()->route('register')->withErrors(['error' => 'Error al registrar el usuario']);
        }
        
        
    }
}

// ...


