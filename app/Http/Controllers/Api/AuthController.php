<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Crear un usuario
     * @param Request $request
     * @return User 
     */
    public function createUser(Request $request)
    {
        try {
            $url = $request->url;
            $comando = "python webscraping.py -u $url";
            $datos_alumno = shell_exec($comando);
            $datos_alumno = json_decode($datos_alumno);

            //Validando
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email|unique:users,email',
                'telefono' => 'required',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $contrasegna = $datos_alumno->nombre.$datos_alumno->boleta.$datos_alumno->carrera;
            $user = User::create([
                'name' => $datos_alumno->nombre,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'password' => Hash::make($contrasegna)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Usuario creado satisfactoriamente',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
        /** */
    }


    /**
     * Inicio de sesión del usuario
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        try {
            $url = $request->url;
            $comando = "python webscraping.py -u $url";
            $datos_alumno = shell_exec($comando);
            $datos_alumno = json_decode($datos_alumno);
            $contrasegna = $datos_alumno->nombre.$datos_alumno->boleta.$datos_alumno->carrera;

            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
            ]);


            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt([
                'email' => $request->email, 
                'password' => $contrasegna
                ])){
                return response()->json([
                    'status' => false,
                    'message' => 'El e-mail y la contraseña no coinciden con los registros',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'El usuario ha iniciado sesión satisfactoriamente',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function logoutUser(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return response()->json([
                'status' => true,
                'message' => 'El usuario ha cerrado sesión satisfactoriamente y los token han sido eliminados',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}