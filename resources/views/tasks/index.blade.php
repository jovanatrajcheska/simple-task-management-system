@extends('welcome')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6 max-w-3xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Tasks</h2>
    
    <div class="flex justify-between items-center mb-6">
        <form action="{{ route('tasks.index') }}" method="GET" class="flex items-center space-x-2">
            <select name="by_category" class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('by_category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <select name="by_status" class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All Tasks</option>
                <option value="1" {{ request('by_status') == 'true' ? 'selected' : '' }}>Completed</option>
                <option value="0" {{ request('by_status') == 'false' ? 'selected' : '' }}>Pending</option>
            </select>

            <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded transition duration-300">
                Filter
            </button>
        </form>
    </div>

    <div class="space-y-4">
        @foreach($tasks as $task)
            <div class="bg-gray-50 rounded-lg p-4 shadow-sm hover:shadow-md transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 style="font-weight:bolder; color: rgb(11, 59, 148)">{{ $task->title }}</h1>
                        <p class="text-sm text-gray-500 mt-1">Status: {{ $task->status ? 'Completed' : 'Pending' }}</p>
                        <p class="text-sm text-gray-500 mt-1">Category: {{ $task->category->name }}</p>
                        <p class="text-sm text-gray-500 mt-1">Due date: {{ $task->due_date }}</p>
                    </div>
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input
                            type="checkbox"
                            name="status"
                            id="status_{{ $task->id }}"
                            class="form-checkbox h-5 w-5 text-blue-600"
                            {{ $task->status ? 'checked' : '' }}
                            onchange="this.form.submit()" />
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <br>
    <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300">
        Create Task
    </a>
</div>
@endsection
