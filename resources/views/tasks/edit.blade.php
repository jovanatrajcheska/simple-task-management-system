<!-- resources/views/tasks/edit.blade.php -->
@extends('welcome')

@section('content')
    <h2 class="text-2xl font-bold py-4">Edit Task</h2>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="title" class="block text-sm font-semibold text-gray-700">Task Title</label>
            <input type="text" id="title" name="title" value="{{ $task->title }}" class="mt-1 block w-full border-2 border-gray-300 rounded-md p-3">
        </div>
        <div class="mb-6">
            <label for="project_id" class="block text-sm font-semibold text-gray-700">Project</label>
            <select id="project_id" name="project_id" class="mt-1 block w-full border-2 border-gray-300 rounded-md p-3">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $project->id == $task->project_id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label for="category_id" class="block text-sm font-semibold text-gray-700">Category</label>
            <select id="category_id" name="category_id" class="mt-1 block w-full border-2 border-gray-300 rounded-md p-3">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $task->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label for="description" class="block text-sm font-semibold text-gray-700">Description</label>
            <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-2 border-gray-300 rounded-md p-3">{{ $task->description }}</textarea>
        </div>
        <div class="mb-6">
            <label for="due_date" class="block text-sm font-semibold text-gray-700">Due Date</label>
            <input type="date" id="due_date" name="due_date" value="{{ $task->due_date }}" class="mt-1 block w-full border-2 border-gray-300 rounded-md p-3">
        </div>
        <button type="submit" class="bg-blue-600 text-white p-3 rounded-md hover:bg-blue-700 transition duration-200">Update Task</button>
    </form>
@endsection
