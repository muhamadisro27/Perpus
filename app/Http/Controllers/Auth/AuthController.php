<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Auth\AuthService;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    public function register(RegisterRequest $request)
    {
        $response = $this->auth->register($request);

        return response($response,201);
    }

    public function login(LoginRequest $request)
    {
        $response = $this->auth->login($request);

        return response($response,200);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        $user->tokens()->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Logout',
        ],200);
    }
    
}
