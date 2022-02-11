<?php

namespace App\Tasks\User;

use App\Exceptions\NotFoundException;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Tasks\Task;
use Exception;

class FindUserByLoginTask extends Task
{
    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(string $login): ?User
    {
        try {
            return $this->repository->findByField('login', $login)->first();
        } catch (Exception $e) {
            throw new NotFoundException();
        }
    }
}
