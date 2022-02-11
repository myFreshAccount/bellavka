<?php

namespace App\Actions\TaskBook;

use App\Actions\Action;
use App\Http\Requests\GetTaskBookByIdRequest;
use App\Tasks\TaskBook\FindTaskBookByIdTask;

class FindTaskBookByIdAction extends Action
{
    public function run(GetTaskBookByIdRequest $request)
    {
        return app(FindTaskBookByIdTask::class)->run($request->id);
    }
}
