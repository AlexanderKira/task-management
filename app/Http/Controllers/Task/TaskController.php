<?php

namespace App\Http\Controllers\Task;

use App\Enums\TaskStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\TaskRequest;
use App\Http\Resources\Task\TaskResource;
use App\Http\Services\Task\Filters\FilterManager;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $user = Auth::user();
        $task = Task::where('user_id', $user->id);
        $taskFilter = new FilterManager();
        $task = $taskFilter->apply($task, $request->all());

        return TaskResource::collection($task->get());
    }

    public function store(TaskRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = Auth::user();
        $validated = $request->validated();
        $data = $validated['task'];
        $data['user_id'] = $user->id;
        $data['status'] = TaskStatusEnum::SCHEDULED->value;
        Task::create($data);

        return response()->json(['message' => 'Task created'], 201);
    }

    public function show(Task $task): TaskResource
    {
        return new TaskResource($task);
    }

    public function update(TaskRequest $request, Task $task): \Illuminate\Http\JsonResponse
    {
        $user = Auth::user();
        $validated = $request->validated();
        $data = $validated['task'];
        $data['user_id'] = $user->id;
        $task->fill($data);
        $task->save();

        return response()->json(['message' => 'Task updated'], 201);
    }


    public function delete(Task $task): \Illuminate\Http\JsonResponse
    {
        $task->delete();

        return response()->json(['message' => 'Task deleted'], 200);
    }

}
