<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function register(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users,name'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed',
            Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],

        ]);

        $user = User::create([
            'name' => $validated["name"],
            'email' => $validated["email"],
            'password' => Hash::make($validated["password"])
        ]);


        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function login(Request $request){
        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required", "string"]
        ]);

        if(Auth::attempt($credentials) === false){
            return response()->json(["msg" => "Invalid Credential"], 418);
        }

        $user = auth()->user();

        $token = $user->createToken($request->userAgent())->plainTextToken;

        return response()->json([$user, $token]);

    }
}
