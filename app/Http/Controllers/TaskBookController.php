<?php

namespace App\Http\Controllers;

use App\Actions\TaskBook\CreateTaskBookAction;
use App\Actions\TaskBook\FindTaskBookByIdAction;
use App\Actions\TaskBook\GetAllTaskBookAction;
use App\Actions\TaskBook\UpdateTaskBookAction;
use App\Consts\WebRoutes;
use App\Exceptions\CreateResourceFailedException;
use App\Http\Requests\CetAllTaskBookRequest;
use App\Http\Requests\CreateTaskBookRequest;
use App\Http\Requests\GetTaskBookByIdRequest;
use App\Http\Requests\UpdateTaskBookRequest;

class TaskBookController extends Controller
{
    public function showAllTaskBooks(CetAllTaskBookRequest $request)
    {
        $taskBooks = app(GetAllTaskBookAction::class)->run($request);
        return view('task.all', compact('taskBooks'));
    }

    public function showCreateTaskBookForm()
    {
        return view('task.create');
    }

    public function createTaskBook(CreateTaskBookRequest $request)
    {
        try {
            $taskBook = app(CreateTaskBookAction::class)->run($request);
        } catch (CreateResourceFailedException) {
            return back()
                ->withErrors(['msg'=>'Ошибка сохранения'])
                ->withInput();
        }

        return redirect()
            ->route(WebRoutes::SHOW_ALL_TASKS)
            ->with(['success'=>'Успешно сохранено']);

    }

    public function showUpdateTaskBookForm(GetTaskBookByIdRequest $request)
    {
        $task = app(FindTaskBookByIdAction::class)->run($request);
        return view('task.edit', compact('task'));
    }

    public function updateTaskBook(UpdateTaskBookRequest $request)
    {
        $updated = app(UpdateTaskBookAction::class)->run($request);
        return redirect()
            ->route(WebRoutes::SHOW_UPDATE_TASK_FORM, $updated->id)
            ->with(['success'=>'Успешно сохранено']);
    }

}
