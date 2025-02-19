<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Task Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-2xl font-bold text-gray-800">Task Management System</h1>
                <nav class="space-x-4">
                    <a href="{{ route('projects.index') }}" class="nav-link">Projects</a>
                    <a href="{{ route('categories.index') }}" class="nav-link">Categories</a>
                    <a href="{{ route('tasks.index') }}" class="nav-link">Tasks</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="flex-grow flex items-center justify-center">
        <div class="container mx-auto px-4">
            @yield('content')
        </div>
    </main>


</body>
</html>
