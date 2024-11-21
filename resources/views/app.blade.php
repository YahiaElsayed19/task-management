<x-layout>
    <x-card>
        <a href="{{ route('task.create') }}"
            class="px-4 py-2 block mb-8 border bg-blue-500 text-white text-center rounded-md  focus:outline-none focus:ring-2 focus:ring-blue-500">
            Add Task</a>
        <form method="GET" action="{{ route('task.index') }}"
            class="space-y-4 p-4 bg-white border border-gray-200 rounded-lg shadow-md mb-8">
            <!-- Search Input -->
            <div class="flex items-center space-x-2">
                <label for="search" class="text-sm font-medium text-gray-700">Search</label>
                <input type="text" name="search" id="search" value="{{ request('search') }}"
                    placeholder="Search tasks..."
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Priority Dropdown -->
            <div class="flex items-center space-x-2">
                <label for="priorty" class="text-sm font-medium text-gray-700">Priority</label>
                <select name="priorty" id="priorty"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All</option>
                    <option value="high" {{ request('priorty') == 'high' ? 'selected' : '' }}>High</option>
                    <option value="medium" {{ request('priorty') == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="low" {{ request('priorty') == 'low' ? 'selected' : '' }}>Low</option>
                </select>
            </div>

            <!-- Status Dropdown -->
            <div class="flex items-center space-x-2">
                <label for="status" class="text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress
                    </option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed
                    </option>
                </select>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end gap-4">
                <a href="{{ route('task.index') }}"
                    class="px-4 py-2 border border-blue-500 text-blue-500 rounded-md  focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Remove Filters</a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Apply
                    Filters</button>
            </div>
        </form>
        <div class="flex flex-col gap-4">
            @forelse ($tasks as $task)
                <x-task-card :$task />
            @empty
                <div class="flex justify-end">
                    <a href="{{ route('task.create') }}"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Add new Task</a>
                </div>
            @endforelse
            <!-- Pagination Links -->
            <div class="mt-6">
                {{ $tasks->appends(request()->query())->links() }}
                <!-- This generates pagination links and preserves the filters -->
            </div>
        </div>
    </x-card>
</x-layout>
