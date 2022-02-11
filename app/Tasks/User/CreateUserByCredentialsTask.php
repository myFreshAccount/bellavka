<?php

namespace App\Tasks\User;

use App\Exceptions\CreateResourceFailedException;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\Hash;

class CreateUserByCredentialsTask extends Task
{
    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(string $login, string $password ): User
    {
        try {
            $model = $this->repository;

            $user = $model->create([
                'login' => $login,
                'password' => Hash::make($password),
            ]);
        } catch (Exception $e) {
            throw new CreateResourceFailedException();
        }
        return $user;
    }
}
