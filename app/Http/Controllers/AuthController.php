<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ) {

    }

    public function showAdminLoginPage()
    {
        return view('admin-login');
    }


    public function login(LoginRequest $request)
    {
        $auth = $this->authService->login($request->validated());

        if (! $auth) {
            back()->with('errors', 'Login fail. The email or password is incorrect!');
        }

        return redirect()->route('question.list');
    }

    public function logout()
    {
        if (! $this->authService->logout()) {
            return back()->with('error', 'Logout failed!');
        }

        return redirect(route('login'))->with('success');
    }
}
