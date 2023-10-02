<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    //login
    public function login(Request $request){
        // Obtengo el usuario basado en el email
        $user = User::whereEmail($request->email)->first();
    
        // Compruebo el usuario y la contraseña
        if($user && Hash::check($request->password, $user->password)){
            $token = $user->createToken('api-token')->plainTextToken;
    
            return response()->json([
                "res" => true,
                "message" => "Bienvenido al sistema, " . $user->name,
                "token" => $token
            ], 200);
        } else {
            return response()->json([
                "res" => false,
                "message" => "Cuenta o Password Invalido"
            ], 401);  
        }
    }

    

    public function logout(Request $request) {
        // obtengo el usuario actualmente autenticado
        $user = $request->user();
    
        // Revocamos todos los tokens del usuario 
        $user->tokens()->delete();
    
        return response()->json(['res' => true, 'message' => 'Adios '. $user->name]);
    }
    
}
