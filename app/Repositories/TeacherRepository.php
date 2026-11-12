<?php

namespace App\Repositories;

use App\Interfaces\TeacherRepositoryInterface;
use App\Models\Teacher; 
use App\Dto\TeacherDto;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function getAllTeachers()
    {
        return Teacher::latest()->get();
    }

    public function getTeacherById($id)
    {
        return Teacher::findOrFail($id);
    }

    public function store(TeacherDto $dto)
    {
        $data = $dto->toArray();
        
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return Teacher::create($data);
    }

    public function update(TeacherDto $dto, $id)
    {
        $teacher = Teacher::findOrFail($id);
        
        $data = $dto->toArray();
        if (empty($data['password'])) {
            unset($data['password']); 
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $teacher->update($data);
        return $teacher;
    }

    public function delete($id)
    {
        $teacher = Teacher::findOrFail($id);
        return $teacher->delete();
    }
}