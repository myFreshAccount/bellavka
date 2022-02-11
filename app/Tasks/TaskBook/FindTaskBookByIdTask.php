<?php

namespace App\Tasks\TaskBook;

use App\Exceptions\NotFoundException;
use App\Models\TaskBook;
use App\Repositories\TaskBookRepository;
use App\Tasks\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\CssSelector\Exception\InternalErrorException;

class FindTaskBookByIdTask extends Task
{
    protected TaskBookRepository $repository;

    public function __construct(TaskBookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $id): TaskBook
    {
        try {
            return $this->repository->find($id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new InternalErrorException();
        }
    }
}
