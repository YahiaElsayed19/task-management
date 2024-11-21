<x-layout>
    <x-card>
        <form method="POST" action="{{ route('task.store') }}"
            class="space-y-4 p-4 bg-white border border-gray-200 rounded-lg shadow-md">
            @csrf

            <!-- Task Title -->
            <div class="flex items-center space-x-2">
                <label for="title" class="text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Task Title"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror">
                @error('title')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Task Description -->
            <div class="flex items-center space-x-2">
                <label for="description" class="text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" placeholder="Task Description"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Priority Dropdown -->
            <div class="flex items-center space-x-2">
                <label for="priorty" class="text-sm font-medium text-gray-700">Priority</label>
                <select name="priorty" id="priorty"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('priorty') border-red-500 @enderror">
                    <option value="">Select Priority</option>
                    <option value="high" {{ old('priorty') == 'high' ? 'selected' : '' }}>High</option>
                    <option value="medium" {{ old('priorty') == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="low" {{ old('priorty') == 'low' ? 'selected' : '' }}>Low</option>
                </select>
                @error('priorty')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Status Dropdown -->
            <div class="flex items-center space-x-2">
                <label for="status" class="text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('status') border-red-500 @enderror">
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress
                    </option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Deadline -->
            <div class="flex items-center space-x-2">
                <label for="deadline" class="text-sm font-medium text-gray-700">Deadline</label>
                <input type="date" name="deadline" id="deadline" value="{{ old('deadline') }}"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('deadline') border-red-500 @enderror">
                @error('deadline')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end gap-4">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Add
                    Task</button>
            </div>
        </form>
    </x-card>
</x-layout>
