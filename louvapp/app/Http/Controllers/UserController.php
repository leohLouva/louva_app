<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DataTables;


class UserController extends Controller
{
    //ver lista de usuarios
    public function index(Request $request)
    {
        return view('user/listUsers');
    }

    
    //ver formulario de agregar usuarios
    public function viewAddUser()
    {
        return view('user/addUser');
    }

    public function store(Request $request)
    {
        
        //dd($request);
        // Validar los datos del formulario
        /*$validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'userName' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'access_level' => 'required|string|max:255',
            'img_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        */
        //dd($request->all());
        // Guardar el usuario en la base de datos
        $user = new User([
            'name' => $request->txtName,
            'lastName' => $request->txtLastName,
            'userName' => $request->txtUserName,
            'email' => $request->txtEmail,
            'password' => Hash::make($request->txtPassword),
            'access_level' => $request->slcAccess,
            'isDisable' => 0

        ]);

        // Subir y almacenar la imagen de perfil si se proporciona
        if ($request->hasFile('img_profile')) {
            $imgPath = $request->file('img_profile')->store('img_profiles');
            $user->img_profile = $imgPath;
        }else{
            $user->img_profile = "sin imagen";
        }
        //dd($request->all());
        $user->save();
        
        echo "Finalizado y se agregó";
        
        //return redirect()->route('listUsers')->with('success', 'Usuario agregado correctamente.');
    }
    public function getListUser(Request $request){ 
        dd($request);
    }


}
