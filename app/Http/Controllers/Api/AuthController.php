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
            //Validando
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email|unique:users,email',
                'telefono' => 'required',
                'url' => 'required',
            ]);

            
            /****webscraping*****/
            /****webscraping*****/
            /****webscraping*****/
            $url = $request->url;
            $url = explode("=", $url)[1];
            $url = "https://servicios.dae.ipn.mx/vcred/?h=".$url;
            $comando = "python webscraping.py -u $url";
            $datos_alumno = shell_exec($comando);
            $datos_alumno = json_decode($datos_alumno);
             
            /****webscraping*****/
            /****webscraping*****/
            /****webscraping*****/

            // https://servicios.dae.ipn.mx/vcred/?h=a5a592d479a79d351d325e9544c4bac746db4cb8cac14096b7dd4de42c1257
            // https://www.dae.ipn.mx/vcred/?h=a5a592d479a79d351d325e9544c4bac746db4cb8cac14096b7dd4de42c1257

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validateUser->errors()
                ], 401);
            }
                
            if( $datos_alumno->escuela == 'ESIME UNIDAD CULHUACAN'|| 'ESIME UNIDAD CULHUAC&Aacute;N' && $datos_alumno->escuela != ""){
            $contrasegna = $datos_alumno->nombre.$datos_alumno->boleta.$datos_alumno->carrera;
                        $user = User::create([
                'email' => $request->email, //$request es lo que escribe o manda el usuario
                'telefono' => $request->telefono,

                'name' => $datos_alumno->nombre, //$datos_alumno es lo que se extrae de la credencial
                'boleta' => $datos_alumno->boleta,
                'carrera' => $datos_alumno->carrera,
                'escuela' => $datos_alumno->escuela,
                'vigencia' => $datos_alumno->vigencia,
                'foto' => $datos_alumno->foto,
                'password' => Hash::make($contrasegna)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Usuario creado satisfactoriamente',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        
            return response() ->json([
                'status' => false,
                'message' => 'No pertenece a esta unidad academica',
                 ], 401);
        }

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
            $url = explode("=", $url)[1];
            $url = "https://servicios.dae.ipn.mx/vcred/?h=".$url;
            $comando = "python webscraping.py -u $url";
            $datos_alumno = shell_exec($comando);
            $datos_alumno = json_decode($datos_alumno);

            $datos_alumno->escuela;
            if( $datos_alumno->escuela == 'ESIME UNIDAD CULHUACAN'|| 'ESIME UNIDAD CULHUAC&Aacute;N' && $datos_alumno->escuela != ""){
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
        }
        return response() ->json([
            'status' => false,
            'message' => 'No pertenece a esta unidad academica',
             ], 401);
             
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

    public function verSesion()
    {
        $usuario = Auth::user();
        return $usuario;
    }
}