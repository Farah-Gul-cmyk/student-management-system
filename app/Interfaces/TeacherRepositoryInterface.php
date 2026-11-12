<?php

namespace App\Interfaces;

use App\Dto\TeacherDto;

interface TeacherRepositoryInterface
{
    public function getAllTeachers();
    public function getTeacherById($id);
    public function store(TeacherDto $dto);
    public function update(TeacherDto $dto, $id);
    public function delete($id);
}