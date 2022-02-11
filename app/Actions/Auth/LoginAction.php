<?php

namespace App\Actions\Auth;

use App\Actions\Action;
use App\Exceptions\LoginFailedException;
use App\Http\Requests\LoginRequest;
use App\Tasks\Auth\LoginTask;
use Illuminate\Support\Facades\Auth;

class LoginAction extends Action
{
    public function run(LoginRequest $request)
    {
        $data = $request->validated();

        $isSuccessful = app(LoginTask::class)->run($data['login'], $data['password']);
        $isSuccessful ? $user = Auth::user() : throw new LoginFailedException();
        return $user;
    }
}
