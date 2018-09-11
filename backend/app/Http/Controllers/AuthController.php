<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
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
        $request->validate([
            'email' => 'required|email|max:50',
        ]);

        //checking for the email in the database
        $user = User::where('email',  $request->email)->first();
        
        //if the request is to register a new user
        if($auth === 'reg') 
        {
            if ($user)
            {   
                // email already exists -- on signup
                return response()->json([
                    'email' => $user->email,
                    'message' => 'email already exists'],
                    401
                );
            }
            else
            {   
                //success
                return response()->json([
                    'email' => $request->email,
                    'message' => 'success']
                );
            }
        }
        elseif($auth === 'log') //if the request is to login an existing user
        {
            if ($user)
            {   
                //success 
                return response()->json(['email' => $user->email]);
            }
            else
            {   
                // email does not exist -- on login
                return response()->json([
                    'email' => $request->email,
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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        // validate registration
        $request->validate([
            'first_name' => 'alpha|max:50',
            'last_name' => 'alpha|max:50',
            'email' => 'bail|required|email|max:50',
            'username' => 'required|alpha-num|max:15',
            'password' => 'required|max:190',
        ]);

        // create a new user 
        $new_user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['data' => $new_user]);

    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
    */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
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

    
}
