<?php

namespace App\Repositories;

use App\Interfaces\BatchRepositoryInterface;
use App\Models\Batch;
use App\Dto\BatchDto;

class BatchRepository implements BatchRepositoryInterface
{
    public function getAllBatches()
    {
        return Batch::with('course')->latest()->get();
    }

    public function getBatchById($id)
    {
        return Batch::findOrFail($id);
    }

    public function store(BatchDto $dto)
    {
        return Batch::create($dto->toArray());
    }

    public function update(BatchDto $dto, $id)
    {
        $batch = Batch::findOrFail($id);
        $batch->update($dto->toArray());
        return $batch;
    }

    public function delete($id)
    {
        $batch = Batch::findOrFail($id);
        return $batch->delete();
    }
}