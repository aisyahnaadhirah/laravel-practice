<?php

use Livewire\Component;
use App\Models\Course;
use App\Models\Student;

new class extends Component
{
    public $count = 0;
    public $name = '';
    public $email = '';
    public $course_id = '';
    public $courses = [];

    public function mount() {
        $this->courses = Course::all();
    }

    public function increment() {
        $this->count++;
    }

    public function submitName() {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:students,email',
            'course_id' => 'required|exists:courses,id',
        ]);

        Student::create([
            'name' => $this->name,
            'email' => $this->email,
            'course_id' => $this->course_id,
        ]);
        $this->reset(['name', 'email', 'course_id']);
        session()->flash('success', 'Student added successfully!');
    }
};
?>

<div>
    <h1>Livewire Counter</h1>
    <p>Count: {{ $count }}</p>
    <button wire:click="increment">
        Add Count
    </button>

    @if (session()->has('success'))
        <p>
            {{ session('success') }}
        </p>
    @endif

    <form wire:submit="submitName">
        <h2>Enter your name</h2>
        <input 
            type="text"
            wire:model.live="name"
            placeholder="Enter your name"
        >
        @error('name')
            <p>{{ $message }}</p>
        @enderror
        <p>You typed: {{$name}}</p>
        <button type="submit">
            Submit Name
        </button>

        <input type="email"
            wire:model="email"
            placeholder="Enter your email"
        >
        @error('email')
            <p>{{ $message }}</p>
        @enderror

        <select wire:model="course_id">
            <option value="">Select Course</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">
                    {{ $course->course_name }}
                </option>
            @endforeach
        </select>

        @error('course_id')
            <p>{{ $message }}</p>
        @enderror
    </form>
</div>