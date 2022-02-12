<?php

namespace App\Http\Controllers;

use App\Actions\TaskBook\CreateTaskBookAction;
use App\Actions\TaskBook\FindTaskBookByIdAction;
use App\Actions\TaskBook\GetAllTaskBookAction;
use App\Actions\TaskBook\UpdateTaskBookAction;
use App\Consts\WebRoutes;
use App\Exceptions\CreateResourceFailedException;
use App\Exceptions\NotFoundException;
use App\Http\Requests\CetAllTaskBookRequest;
use App\Http\Requests\CreateTaskBookRequest;
use App\Http\Requests\GetTaskBookByIdRequest;
use App\Http\Requests\UpdateTaskBookRequest;
use Yajra\DataTables\Facades\DataTables;

class TaskBookController extends Controller
{
    public function showAllTaskBooks(CetAllTaskBookRequest $request)
    {
        return view('task.all');
    }

    public function getAllTaskBooks(CetAllTaskBookRequest $request)
    {
        $taskBooks = app(GetAllTaskBookAction::class)->run($request);
        return Datatables::of($taskBooks)
            ->addColumn('status', function($row) {
                return $row->checked ? 'отредактировано администратором' : '';
            })
            ->addColumn('button', function($row) {
                $updateRoute = route(WebRoutes::SHOW_UPDATE_TASK_FORM, $row->id);
                return '<a href="' . $updateRoute . '"><i class="fas fa-pencil-alt"></i></a>';
            })
            ->rawColumns(['button'])
            ->make(true);
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
        try {
            $task = app(FindTaskBookByIdAction::class)->run($request);
        } catch (NotFoundException) {
            abort(404);
        }
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
