<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\AuthApiService;

class AuthApiController extends Controller {
	public function __construct(AuthApiService $service) {
		$this->service = $service;
	}
	
	public function login(Request $request)
    {
        return $this->service->login($request);
    }
	
	public function logout(Request $request)
	{
		return $this->service->logout($request);
	}
}