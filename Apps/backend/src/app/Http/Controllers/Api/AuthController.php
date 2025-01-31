<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Successfully logged in',
                'token_type' => 'Bearer',
                'token' => $token,
                'user' => $user
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Unauthorized'
        ], 401);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Successfully registered',
            'token_type' => 'Bearer',
            'token' => $token,
            'user' => $user
        ], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out'
        ], 200);
    }
}
