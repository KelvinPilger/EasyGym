<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Services\AuthService;

class AuthController extends Controller
{
	public function __construct(AuthService $service) {
		$this->service = $service;
	}
	
    public function login(Request $request) {
		return $this->service->login($request);
	}
		
	public function logout(Request $request) {
		return $this->service->logout($request);
	}
}
