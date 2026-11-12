<?php

namespace App\Http\Controllers;

use App\Dto\Student\StudentDto;
use App\Http\Requests\StudentRequest;
use App\Interfaces\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        $user = auth()->user();

        if ($user && method_exists($user, 'isTeacher') && $user->isTeacher() && isset($user->class_id)) {
            $students = $this->studentRepository->getByClass($user->class_id);
        } else {
            $students = $this->studentRepository->getAll();
        }

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(StudentRequest $request)
    {
        $studentDto = StudentDto::fromRequest($request);
        $this->studentRepository->create($studentDto);

        return redirect()->route('students.index')->with('success', 'Student successfully created!');
    }

    public function edit($id)
    {
        $student = $this->studentRepository->getById($id);
        return view('students.edit', compact('student'));
    }

    public function update(StudentRequest $request, $id)
    {
        $studentDto = StudentDto::fromRequest($request);

        $this->studentRepository->update($id, $studentDto);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy($id)
    {
        $this->studentRepository->delete($id);
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}