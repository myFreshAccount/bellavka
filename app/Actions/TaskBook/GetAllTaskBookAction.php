<?php

namespace App\Actions\TaskBook;

use App\Actions\Action;
use App\Http\Requests\CetAllTaskBookRequest;
use App\Tasks\TaskBook\GetAllTaskBooksTask;

class GetAllTaskBookAction extends Action
{
    public function run(CetAllTaskBookRequest $request)
    {
        return app(GetAllTaskBooksTask::class)->run(true);
    }
}
