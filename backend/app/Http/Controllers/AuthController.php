<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

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
     * Check if an email exists
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkemail(Request $request, $auth)
    {

        //checking for the email in the database
        $user = User::where('email',  $request->email)->first();
        
        //if the request is to register a new user
        if($auth === 'reg') 
        {
            if ($user)
            {   
                // email already exists -- on signup
                return response()->json([
                    'data' => $user->email,
                    'message' => 'email already exists'],
                    401
                );
            }
            else
            {   
                //success
                return response()->json(['data' => $request->email]);
            }
        }
        elseif($auth === 'log') //if the request is to login an existing user
        {
            if ($user)
            {   
                //success 
                return response()->json(['data' => $user->email]);
            }
            else
            {   
                // email does not exist -- on login
                return response()->json([
                    'data' => $request->email,
                    'message' => 'unkown email address'],
                    401
                );
            }
        }
        else
        {
            // if unkown parameters are passed in
            return response()->json([
                'message' => 'unkown auth type'],
                400
            );
        }
        
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
