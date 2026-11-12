<?php

namespace App\Repositories;

use App\Interfaces\EnrollmentRepositoryInterface;
use App\Models\Enrollment;
use App\Dto\EnrollmentDto;

class EnrollmentRepository implements EnrollmentRepositoryInterface
{
    public function getAllEnrollments()
    {
        return Enrollment::with(['student', 'batch.course'])->latest()->get();
    }

    public function getEnrollmentById($id)
    {
        return Enrollment::findOrFail($id);
    }

    public function store(EnrollmentDto $dto)
    {
        return Enrollment::create($dto->toArray());
    }

    public function update(EnrollmentDto $dto, $id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update($dto->toArray());
        return $enrollment;
    }

    public function delete($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        return $enrollment->delete();
    }
}