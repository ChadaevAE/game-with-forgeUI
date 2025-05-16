<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        if (!Auth::attempt($request->only(['email', 'password'])))
        {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
            'user' => $user,
            'token' => $user->createToken('API Token', ['read-only'])->plainTextToken
        ]);
    }

    public function register(StoreUserRequest $request)
    {
        return User::create($request->all());
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
    }
}
