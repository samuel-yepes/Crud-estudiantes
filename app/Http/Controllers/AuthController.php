<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{

    public function vistaLogin()
    {
        return view('auth.login');
    }

    public function vistaRegistro()
    {
        return view('auth.registro');
    }

    public function registro(Request $request)
    {
        Administrador::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) { //verifica las credenciales
            $request->session()->regenerate();
            
            try {
                $token = JWTAuth::attempt($credentials);
                session(['jwt_token' => $token]);
            } catch (JWTException $e) {
            }
            
            return redirect()->route('estudiantes.index');
        }

        return back()->with('error', 'Credenciales incorrectas');
    }


    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
        } catch (JWTException $e) {
            return redirect('/login')->with('error', 'No se pudo cerrar la sesión');
        }
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    

    public function getToken(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Credenciales incorrectas'
                    ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo crear el token'
                ], 500);
        }
        return response()->json([
            'success' => true,
            'token' => $token,
            'type' => 'Bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
            ]);
    }

    public function ver() // ver quien esta autenticado con el token
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuario no encontrado'
                ], 404);
            }
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Token inválido'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'user' => $user
        ]);
}

}
