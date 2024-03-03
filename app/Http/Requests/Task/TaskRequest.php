<?php

namespace App\Http\Requests\Task;

use App\Enums\TaskStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class TaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'task' => ['required', 'array'],
            'task.title' => ['required', 'string', 'max:255'],
            'task.description' => ['nullable', 'string'],
            'task.status' => new Enum(TaskStatusEnum::class)
        ];
    }
}
