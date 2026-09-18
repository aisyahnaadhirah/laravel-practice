<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-3xl font-bold text-blue-600">Student List</h1>

        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <a href="{{ route('students.create') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mb-4">Add Student</a>
        <br><br>

        <table class="w-full mt-6">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Course</th>
                    <th class="px-4 py-3 text-left">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($students as $student)
                    <tr>
                        <td class="px-4 py-3">{{ $student->id }}</td>
                        <td class="px-4 py-3">{{ $student->name }}</td>
                        <td class="px-4 py-3">{{ $student->email }}</td>
                        <td class="px-4 py-3">{{ $student->course->course_name ?? '-' }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ route('students.edit', $student->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Edit</a>
                            <!-- guna form action sebab link <a> biasa buat request GET, tapi kita nak hantar req DELETE -->
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>