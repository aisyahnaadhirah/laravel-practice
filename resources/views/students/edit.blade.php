<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-blue-600 mb-6">Edit Student</h1>

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- PUT untuk update, post untuk addnew data -->

            <div class="mb-4">
                <lable class="block text-gray-700 font-medium mb-2">Name</lable>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ $student->name }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <div class="mb-4">
                <lable class="block text-gray-700 font-medium mb-2">Email</lable>
                <input 
                    type="text" 
                    name="email" 
                    value="{{ $student->email }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

            <div class="mb-4">
                <lable class="block text-gray-700 font-medium mb-2">Course</lable>
                <select name="course_id" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}"
                            {{ old('course_id', $student->course_id) == $course->id ? 'selected' : '' }} >  <!-- Ambik data sedia ada -->
                            {{ $course->course_name }}
                        </option>
                    @endforeach
                </select>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">Update Student</button>
        </form>
    </div>
</body>
</html>