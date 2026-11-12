<?php

namespace App\Http\Controllers;

use App\Interfaces\CourseRepositoryInterface;
use App\Http\Requests\CourseRequest;
use App\Dto\CourseDto;

class CourseController extends Controller
{
    protected $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        $courses = $this->courseRepository->getAllCourses();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(CourseRequest $request)
    {
        $dto = CourseDto::fromRequest($request);
        $this->courseRepository->store($dto);

        return redirect()->route('courses.index')->with('success', 'Course added successfully.');
    }

    public function edit($id)
    {
        $course = $this->courseRepository->getCourseById($id);
        return view('courses.edit', compact('course'));
    }

    public function update(CourseRequest $request, $id)
    {
        $dto = CourseDto::fromRequest($request);
        $this->courseRepository->update($dto, $id);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $this->courseRepository->delete($id);
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}