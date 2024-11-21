<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'status' => 'required|in:' . implode(',', Task::$status),
            'priorty' => 'required|in:' . implode(',', Task::$priorty),
            'deadline' => 'required|date',
        ];
    }
}
