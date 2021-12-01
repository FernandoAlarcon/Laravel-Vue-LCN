<?php

namespace App\Http\Controllers;

use App\Models\User; 
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthController extends Controller
{   
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login', 'register']]);
    // }

    public function register(Request $request)
    {   
        $v = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password'  => 'required|min:3|confirmed',
        ]);
        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;  
        $user->password = Hash::make($request->password);
        //bcrypt($request->password);
        $user->save();
        return response([
            'status' => 'success',
            'data' => $user
           ], 200);

        //return $request->all();
    }

    public function  login(Request $request)
    {   

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = request(['email', 'password']);
        $email       = $request->email;
        $user        = User::where('email', $email)->first();
        
        if(!$user) return response()->json(['error' => 'User not found.'], 404);

        //$credentials = $request->only('email', 'password');
        // $token = JWTAuth::attempt($credentials)
        //if  ( $token = JWTAuth::attempt($credentials)) 
        if  ($token = $this->guard()->attempt($credentials))
        {
            return response()->json(['status' => 'success'], 200)->header('Authorization', $token);
            
        }else{
            return response([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.'
            ], 400);
            //return response()->json(['error' => 'login_error'], 401);
        }
 
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return response([
                'status' => 'success',
                'data' => $user
            ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    // public function logout(Request $request) {

    //     $request->user()->token()->revoke();
    
    //     return response()->json([
    //        'message' => 'Successfully logged out'
    //     ]);
    // }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    private function guard()
    {
        return Auth::guard();
    }
}