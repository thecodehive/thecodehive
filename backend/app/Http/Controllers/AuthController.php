<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance
     * 
     * @return void
     */
    public function function__construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Check if email is already taken
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkemail(Request $request)
    {
        $user = App\User::where('email',  $request->email)->first();

        if ($user){
            return response()->json(['data' => $user->email, 'message' => 'email exists'], 401);
        }
       return response()->json(['data' => $request->email]);
    }

    /**
     * Check if everything is okay
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function hello()
    {
       return response()->json(['hello' => true]);
    }
}
