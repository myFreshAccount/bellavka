<?php

namespace App\Tasks\TaskBook;

use App\Repositories\TaskBookRepository;
use App\Tasks\Task;

class GetAllTaskBooksTask extends Task
{
    protected TaskBookRepository $repository;

    public function __construct(TaskBookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($skipPagination = false)
    {
        return $skipPagination
            ? $this->repository->all()
            : $this->repository->paginate(config('repository.pagination.limit', 3));
    }
}
