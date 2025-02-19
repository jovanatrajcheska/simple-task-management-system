@extends('welcome')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6 max-w-3xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Projects</h2>
    
    <div class="flex justify-between items-center mb-6">
        
        
        <form action="{{ route('projects.index') }}" method="GET" class="flex items-center space-x-2">
            <select name="overdue" class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All Projects</option>
                <option value="true" {{ request('overdue') == 'true' ? 'selected' : '' }}>Overdue Projects</option>
                <option value="false" {{ request('overdue') == 'false' ? 'selected' : '' }}>Upcoming Projects</option>
            </select>

            <input type="date" name="start_date" value="{{ request('start_date') }}" class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <input type="date" name="end_date" value="{{ request('end_date') }}" class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded transition duration-300">
                Filter
            </button>
        </form>
    </div>

    <div class="space-y-4">
        @foreach($projects as $project)
            <div class="bg-gray-50 rounded-lg p-4 shadow-sm hover:shadow-md transition duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 style = "font-weight:bolder; color: rgb(11, 59, 148)">{{ $project->name }}</h1>
                        <p class="text-sm text-gray-500 mt-1">Due: {{ $project->due_date }}</p>
                        <p class="text-sm text-gray-500 mt-1">Short Description: {{ $project->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br>
    <a href="{{ route('projects.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300">
        Create Project
    </a>
</div>
@endsection
