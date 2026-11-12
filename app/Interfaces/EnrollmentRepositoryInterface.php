<?php

namespace App\Interfaces;

use App\Dto\EnrollmentDto;

interface EnrollmentRepositoryInterface
{
    public function getAllEnrollments();
    public function getEnrollmentById($id);
    public function store(EnrollmentDto $dto);
    public function update(EnrollmentDto $dto, $id);
    public function delete($id);
}