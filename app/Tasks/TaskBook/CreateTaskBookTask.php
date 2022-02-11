<?php

namespace App\Tasks\TaskBook;

use App\Exceptions\CreateResourceFailedException;
use App\Models\TaskBook;
use App\Repositories\TaskBookRepository;
use App\Tasks\Task;

class CreateTaskBookTask extends Task
{
    protected TaskBookRepository $repository;

    public function __construct(TaskBookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data): TaskBook
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
