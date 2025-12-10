<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthApiService
{
	public function login($request) {
		$credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($credentials)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        $user = $request->user();

        $token = $user->createToken('easygym-api')->plainTextToken;

        return response()->json([
            'user'  => $user,
            'token' => $token,
        ]);
	}
	
	public function logout($request) {
		$request->user()->currentAccessToken()->delete();

		return response()->json([
			'message' => 'Logout realizado com sucesso.'
		]);
	}
}
