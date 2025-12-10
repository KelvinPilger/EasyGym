<?php

namespace App\Services;

use Throwable;
use Illuminate\requestbase\Eloquent\ModelNotFoundException;

class AuthService
{
	public function login($request) {
		$credentials = $request->validate([
			'email' => ['required', 'email'],
			'password' => ['required']
		]);
		
		if (!Auth::attempt($credentials)) {
			return response()->json(['code' => Response::HTTP_UNAUTHORIZED, 'message' => 'Credenciais inválidas.'], Response::HTTP_UNAUTHORIZED);
		}
		
		$request->session()->regenerate();
		
		return response()->json([
			'user' => $request->user(),
		]);
	}
	
	public function logout($request) {
		Auth::guard('web')->logout();
		
		$request->session()->inavlidate();
		$request->session()->regenerateToken();
		
		return response()->json(['code' => Response::HTTP_OK, 'message' => 'Logout realizado.']);
	}
}
