<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    private function createToken($user) {
        //creo un token para el usuario
        return $user->createToken('authToken')->plainTextToken;
    }
    //Validación de datos
    public function register(Request $request){
        //Validación de datos
        $this->validate($request,[
            'name' => 'required|string|max:255',//|unique:users,name
            'email' => 'required|string|email|max:255', //correo unico 
            'password' => 'required|string|min:8'//minimo 8 caracteres
        ]);

        //Crear usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email, //unique:users,email
            'password' => Hash::make($request->password)
        ]);
        //Crear token
        // $token = $user->createToken('authToken')->plainTextToken;
        $token = $this->createToken($user);
        //Respuesta
        return response()-> json(['message' => 'Usuario creado correctamente', 'token' => $token], 200) ;
    }

        public function login(Request $request){
            //Validación de datos
            $credentials = $request->only('email','password');
            
            if(Auth::attempt($credentials)){
                $user = Auth::user();
                // $token = $user->createToken('authToken')->plainTextToken;
                //Como me da eerror este, hice una función privada para crear el token y lo llamo con $this
                $token = $this->createToken($user);
                return response()-> json(['message' => 'Usuario creado correctamente', 'token' => $token], 200) ;
            }
            else{
                return response()->json(['message' => 'Credenciales incorrectas'], 401);
            }
            
        }

        public function user(Request $request){
            $user = $request->user();
            if($user){
                return response()->json([
                    'name' => $user->name,
                    'email' => $user->email
                ]) ;
            } else{
                return response()->json(['message' => 'Credenciales incorrectas'], 401);
            }
        }

        public function logout(){
            Auth::logout();
            return response()->json(['message' => 'Sesión cerrada']);
        }


    }

