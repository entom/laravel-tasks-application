<?php

namespace App\Http\Controllers;

use App\User;
use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{

    /**
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * TaskController constructor.
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user())
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name
        ]);

        return redirect('/tasks');
    }

    /**
     * @param Request $request
     * @param Task $task
     */
    public function destroy(Request $request, Task $task)
    {

    }

}
