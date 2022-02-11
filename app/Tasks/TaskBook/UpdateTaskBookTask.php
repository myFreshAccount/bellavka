<?php

namespace App\Tasks\TaskBook;

use App\Exceptions\UpdateResourceFailedException;
use App\Models\TaskBook;
use App\Repositories\TaskBookRepository;
use App\Tasks\Task;

class UpdateTaskBookTask extends Task
{
    protected TaskBookRepository $repository;

    public function __construct(TaskBookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $id, array $data): TaskBook
    {
        try {
            return $this->repository->update($data, $id);
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
