<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function register(Request $r)
    {
        $data = $r->validate([
            'first_name'    => 'required|string|max:20',
            'lastname_name' => 'required|string|max:20',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:8',
            'gender'        => 'required|string|max:15',
            'birthdate'     => 'required|date_format:Y-m-d',
            'country'       => 'required|string|max:20',
        ]);

        $user = User::create([
            'first_name'    => $data['first_name'],
            'lastname_name' => $data['lastname_name'],
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
            'gender'        => $data['gender'],
            'birthdate'     => $data['birthdate'],
            'country'       => $data['country'],
        ]);

        $token = $user->createToken('mobile-token')->plainTextToken;

        return response()->json([
            'user'  => $user,
            'token' => $token,
        ], 201);
    }

    public function login(Request $r)
    {
        $credentials = $r->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('mobile-token')->plainTextToken;

        return response()->json([
            'user'  => $user,
            'token' => $token,
        ]);
    }

    public function profile(Request $r)
    {
        return response()->json($r->user());
    }

    public function logout(Request $r)
    {
        $r->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Session successfully closed']);
    }

}
