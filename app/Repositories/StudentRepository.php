<?php

namespace App\Repositories;

use App\Dto\Student\StudentDto;
use App\Models\User; 
use App\Interfaces\StudentRepositoryInterface;

class StudentRepository implements StudentRepositoryInterface
{
    public function getAll()
    {
        return User::where('role', 'student')->latest()->get();
    }

    public function getAllStudents()
    {
        return $this->getAll();
    }

    public function getById(int $id)
    {
        return User::where('role', 'student')->findOrFail($id);
    }

    public function create(StudentDto $studentDto)
    {
        $data = $studentDto->toArray();
        $data['role'] = 'student';
        
        if (empty($data['password'])) {
            $data['password'] = bcrypt('12345678'); // Default password
        } else {
            $data['password'] = bcrypt($data['password']);
        }
        
        return User::create($data);
    }

    public function update(int $id, StudentDto $studentDto)
    {
        $student = $this->getById($id);
        
        $data = $studentDto->toArray();
        if (empty($data['password'])) {
            unset($data['password']);
        }

        $student->update($data);
        return $student;
    }

    public function delete(int$id)
    {
        $student = $this->getById($id);
        return $student->delete();
    }
}