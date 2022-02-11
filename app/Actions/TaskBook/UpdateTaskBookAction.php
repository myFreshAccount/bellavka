<?php

namespace App\Actions\TaskBook;

use App\Actions\Action;
use App\Http\Requests\UpdateTaskBookRequest;
use App\Tasks\TaskBook\UpdateTaskBookTask;

class UpdateTaskBookAction extends Action
{
    public function run(UpdateTaskBookRequest $request)
    {
        $data = $request->validated();
        return app(UpdateTaskBookTask::class)->run($request->id, $data);
    }
}
