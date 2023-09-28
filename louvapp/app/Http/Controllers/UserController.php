<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;

    
class UserController extends Controller
{
    //ver lista de usuarios
    public function index()
    {
        //$user = User::all();
        $user = DB::table('users')
                ->leftjoin('access_level', 'users.access_level', '=', 'access_level.idAccess')
                ->get();
        return view('usuarios/lista-usuarios', ['users' => $user]);
    }

    
    //ver formulario de agregar usuarios
    public function verAgregarUsuario()
    {
        return view('usuarios/agregar-usuario');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        // Validar los datos del formulario
        /*$validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'userName' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'access_level' => 'required|string|max:255'
        ]);*/
        // Guardar el usuario en la base de datos
        $user = new User([
            'name' => $request->txtName,
            'lastName' => $request->txtLastName,
            'userName' => $request->txtUserName,
            'email' => $request->txtEmail,
            'password' => Hash::make($request->txtPassword),
            'access_level' => $request->slcAccess,
            'isDisable' => 0,
            'img_profile' => $request->flImage
        ]);
        $user->save();
        
        return redirect()->route('editar-usuario.show', ['id' => $user->id])->with('success', 'Usuario agregado correctamente.');

    }

    public function show($id){
        //$user = User::find($id);
        $user = DB::table('users')
            ->leftjoin('access_level', 'users.access_level', '=', 'access_level.idAccess')
            ->where('users.id', '=', $id)
            ->first();
        return view('usuarios/editar-usuarios', ['user' => $user]);
    }

    public function update(User $user, Request $request){
        $user->update([
            'name' => $request->txtName,
            'lastName' => $request->txtLastName,
            'userName' => $request->txtUserName,
            'img_profile' => $request->flImage,
            'updated_at' => now()
        ]);
        
        return redirect()->route('editar-usuario.show', ['id' => $user->id])->with('success', 'Usuario editado correctamente.');


    }

    



}
