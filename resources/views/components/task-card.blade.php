<div class="w-full mx-auto p-4 bg-white border border-gray-200 rounded-lg shadow-md">
    <div class="flex items-center justify-between">
        <a href="{{ route('task.show', $task) }}" class="text-lg font-semibold text-gray-800">{{ $task->title }}</a>
        <span
            class="px-3 py-1 text-sm font-medium text-white rounded-full
            {{ $task->status === 'completed' ? 'bg-green-500' : ($task->status === 'in_progress' ? 'bg-blue-500' : 'bg-gray-500') }}">
            {{ ucfirst($task->status) }}
        </span>
    </div>
    <p class="mt-2 text-sm text-gray-600">{!! nl2br($task->description) !!}</p>
    <div class="mt-4">
        <div class="flex justify-between items-center text-sm text-gray-500">
            <span><strong>Priority:</strong> {{ ucfirst($task->priorty) }}</span>
            <span><strong>Deadline:</strong> {{ $task->deadline }}</span>
        </div>
        <div class="mt-2 text-sm text-gray-400">
            <p><strong>Created:</strong> {{ $task->created_at->diffForHumans() }}</p>
            <p><strong>Updated:</strong> {{ $task->updated_at->diffForHumans() }}</p>
        </div>
    </div>
    <div class="mt-4 flex justify-end space-x-2">
        <a href="{{ route('task.edit', $task) }}"
            class="px-4 py-2 text-sm text-white bg-blue-500 rounded hover:bg-blue-600">Edit</a>
        <form action="{{ route('task.destroy', $task) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="px-4 py-2 text-sm text-white bg-red-500 rounded hover:bg-red-600">Delete</button>
        </form>
    </div>
</div>
