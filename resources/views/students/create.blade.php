<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-blue-600 mb-6">Add Student</h1>

        <form action="{{ route('students.store') }}" method="POST"> <!-- POST sebab nak hantar data -->
            @csrf  <!-- security level untuk laravel -->

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Name:</label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Email:</label>
                <input 
                    type="text" 
                    name="email"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
         
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Course:</label>
                <select name="course_id"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Course</option>

                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">
                            {{ $course->course_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">
                Add Student
            </button>
        </form>
    </div>
</body>
</html>