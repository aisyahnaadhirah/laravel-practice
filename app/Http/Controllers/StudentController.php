<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Course;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule; //rule untuk validate email supaya tak duplicate, guna kat update()

class StudentController extends Controller
{
    public function index(){
        $students = Student::with('course')->get(); 

        return view ('students.index', compact('students')); //hantar variable $students kepada view
    }

    public function create(){
        $courses = Course::all(); //ambik semua data course

        return view('students.create', compact('courses'));  //compact tu utk hantar data pada view
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'course_id' => 'required|exists:courses,id',
        ]); //nak check semua field wajib diisi

        Student::create($validated); //yang buat insert ke table students

        return redirect()
            ->route('students.index')
            ->with('success', 'Student added successfully.');
    }

    public function edit($id){
        $student = Student::findOrFail($id); //akan cari id, kalau jumpa simpan dalam $student dan hantar ke students.edit view, kalau tak auto bagi 404 not found
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, $id){
        $student = Student::findOrFail($id); //cari id

        $validated = $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email')->ignore($id),  //ignore $id maksudnya email mesti unique
            ],
            'course_id' => 'required|exists:courses,id',
        ]);

        $student->update($validated); //update row id tu je

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }

}
