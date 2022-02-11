<?php

namespace App\Actions\TaskBook;

use App\Actions\Action;
use App\Http\Requests\CreateTaskBookRequest;
use App\Tasks\TaskBook\CreateTaskBookTask;

class CreateTaskBookAction extends Action
{
    public function run(CreateTaskBookRequest $request)
    {
        $data = $request->validated();
        return app(CreateTaskBookTask::class)->run($data);
    }
}
