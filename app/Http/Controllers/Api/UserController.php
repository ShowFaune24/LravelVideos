<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

use function Illuminate\Support\now;

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
        $request->validate([
            "email" => ["required", "email"],
            "password" => ["required", "string"],
            "device_id" => ["string"] //Pl.: Macbook Chrome {ID}
        ]);

        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if(Auth::attempt($credentials) === false){
            return response()->json(["msg" => "Invalid Credential"], 418);
        }

        $user = auth()->user();

        $existingToken = $user->tokens()->where('name', $request->device_id."|".$request->userAgent())->first();

        if ($existingToken) {
            $existingToken->delete();
        }

        $token = $user->createToken($request->device_id."|".$request->userAgent(), ['*'], now()->addWeek())->plainTextToken;

        return response()->json([$user, $token]);

    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(["msg" => "Logout successful"]);
    }

    public function user(Request $request){
        return $request->user();
    }
}
