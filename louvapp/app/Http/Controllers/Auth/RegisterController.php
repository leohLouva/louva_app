<?php
// app/Http/Controllers/Auth/RegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail; 

class RegisterController extends Controller
{
    use RegistersUsers;

    // ... otros métodos ...

    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    { 
        $user = new Register([
            'idContractor_contractors' => $request->data['contratista'],
            'idProject_user' => $request->data['idProyecto'],
            'idJob_jobs' => $request->data['puesto'],
            'idType_user_type' => $request->data['tipoUsuario'],
            'userName' => $request->data['nombreUsuario'],
            'password' => Hash::make($request->password),
            'email' => $request->data['correo'],
            'isDisable' => 0,
            'lastName' => $request->data['apellido'],
            'name' => $request->data['nombre'],
            'rfc' => $request->data['rfc'],
            'personalPhone' => $request->data['telefonoPersonal'],
            'emergencyPhone' => $request->data['telefonoEmergencia'],
            'imgWorker' => $request->data['flImage']
        ]);
        $user->save();
        //$user->email
        $email = 'l.h.v.m.n.c@gmail.com';
        // Después de guardar el usuario
        //\Mail::to($email)->send(new WelcomeMail($user));

        //Mail::to($email)->send(new WelcomeMail($user));

        
            return response()->json([
                'status' => '1',
                'title' => 'ÉXITO',
                'message' => 'TU REGISTRO HA SIDO ALMACENADO CON ÉXITO'
            ]);

        //return response()->json(['status' => 1, 'message' => 'Registro exitoso']);
    }


    // ... otros métodos ...

}
