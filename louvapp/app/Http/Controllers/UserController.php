<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //ver lista de usuarios
    public function listUser()
    {
        //return view('user/listUser');
    }
    
    //ver formulario de agregar usuarios
    public function viewAddUser()
    {
        return view('user/addUser');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'access_level' => 'required|string|max:255',
            'img_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Guardar el usuario en la base de datos
        $user = new User([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'user_name' => $request->input('user_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'access_level' => $request->input('access_level'),
        ]);

        // Subir y almacenar la imagen de perfil si se proporciona
        if ($request->hasFile('img_profile')) {
            $imgPath = $request->file('img_profile')->store('img_profiles');
            $user->img_profile = $imgPath;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario agregado correctamente.');
    }



}
