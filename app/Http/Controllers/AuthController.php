<?php

namespace App\Http\Controllers;

use App\Actions\Auth\LoginAction;
use App\Consts\WebRoutes;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginPage()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        try {
            $result = app(LoginAction::class)->run($request);
        } catch (\Exception $e) {
            return redirect()->route(WebRoutes::LOGIN)->with('status', $e->getMessage());
        }

        return redirect()->intended();
    }
}
