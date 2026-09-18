<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index() {
        $name = 'Naadhirah';
        $course = 'Computer Science';

        return view('hello', compact('name', 'course'));
    }
}
