<?php

namespace App\Interfaces;

interface StudentRepositoryInterface
{
    public function getAll();
    public function getAllStudents();
    public function getById(int $id);
    public function create(\App\Dto\Student\StudentDto $studentDto);
    public function update(int $id, \App\Dto\Student\StudentDto $studentDto);
    public function delete(int $id);
}