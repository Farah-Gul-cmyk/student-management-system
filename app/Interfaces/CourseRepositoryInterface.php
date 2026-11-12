<?php

namespace App\Interfaces;

use App\Dto\CourseDto;

interface CourseRepositoryInterface
{
    public function getAllCourses();
    public function getCourseById($id);
    public function store(CourseDto $dto);
    public function update(CourseDto $dto, $id);
    public function delete($id);
}