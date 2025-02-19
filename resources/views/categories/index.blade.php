@extends('welcome')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6 max-w-3xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Categories</h2>
    
    <div class="mb-6">
        
    </div>

    <div class="space-y-2">
        @foreach($categories as $category)
            <div class="bg-gray-50 rounded-lg p-4 shadow-sm hover:shadow-md transition duration-300 flex justify-between items-center">
                {{-- <a href="#" class="text-lg font-semibold text-blue-600 hover:text-blue-800 transition duration-300">
                    {{ $category->name }}
                </a> --}}
                <h1 style = "font-weight:bolder; color: rgb(11, 59, 148)">  {{ $category->name }}</h1>
                <br>
            </div>
        @endforeach
    </div>
    <br>
    <a href="{{ route('categories.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300">
        Create Category
    </a>

    @if($categories->isEmpty())
        <p class="text-gray-500 text-center mt-4">No categories found.</p>
    @endif
</div>
@endsection
