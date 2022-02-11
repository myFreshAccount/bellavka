<?php

namespace App\Tasks\Auth;

use App\Tasks\Task;
use Illuminate\Support\Facades\Auth;

class LoginTask extends Task
{
    public function run(string $login, string $password, $remember = false): bool
    {
        return Auth::attempt(['login' => $login, 'password' => $password], $remember);
    }
}
