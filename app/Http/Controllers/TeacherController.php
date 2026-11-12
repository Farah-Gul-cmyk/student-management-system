<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Interfaces\TeacherRepositoryInterface;
use App\Dto\TeacherDto;

class TeacherController extends Controller
{
    protected $teacherRepository;

    public function __construct(TeacherRepositoryInterface $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }

    public function index()
    {
        $teachers = $this->teacherRepository->getAllTeachers();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(TeacherRequest $request)
    {
        $dto = TeacherDto::fromRequest($request);
        $this->teacherRepository->store($dto);

        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully.');
    }

    public function edit($id)
    {
        $teacher = $this->teacherRepository->getTeacherById($id);
        return view('teachers.edit', compact('teacher'));
    }

    public function update(TeacherRequest $request, $id)
    {
        $dto = TeacherDto::fromRequest($request);
        $this->teacherRepository->update($dto, $id);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy($id)
    {
        $this->teacherRepository->delete($id);
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}