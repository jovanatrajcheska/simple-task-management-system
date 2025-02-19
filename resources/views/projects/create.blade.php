@extends('welcome')

@section('content')
<div class="flex justify-center items-center h-full">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Create New Project</h2>

        <form action="{{ route('projects.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700">Project Name</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full border-2 border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm">
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700">Project Description</label>
                <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-2 border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm"></textarea>
            </div>

            <div>
                <label for="due_date" class="block text-sm font-semibold text-gray-700">Due Date</label>
                <input type="date" id="due_date" name="due_date" class="mt-1 block w-full border-2 border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm">
            </div>

            <div>
                <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-md hover:bg-blue-700 transition duration-200">Create Project</button>
            </div>
        </form>
    </div>
</div>
@endsection
