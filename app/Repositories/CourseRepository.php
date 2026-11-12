<?php

namespace App\Repositories;

use App\Interfaces\CourseRepositoryInterface;
use App\Models\Course;
     use App\Dto\CourseDto;

class CourseRepository implements CourseRepositoryInterface
{
    public function getAllCourses()
    {
        return Course::latest()->get();
    }

    public function getCourseById($id)
    {
        return Course::findOrFail($id);
    }

    public function store(CourseDto $dto)
    {
        return Course::create($dto->toArray());
    }

    public function update(CourseDto $dto, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($dto->toArray());
        return $course;
    }

    public function delete($id)
    {
        $course = Course::findOrFail($id);
        return $course->delete();
    }
}