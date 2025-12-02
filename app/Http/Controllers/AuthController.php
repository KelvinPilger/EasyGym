<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request) {
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
		
	public function logout(Request $request) {
		Auth::guard('web')->logout();
		
		$request->session()->inavlidate();
		$request->session()->regenerateToken();
		
		return response()->json(['code' => Response::HTTP_OK, 'message' => 'Logout realizado.']);
	}
}
