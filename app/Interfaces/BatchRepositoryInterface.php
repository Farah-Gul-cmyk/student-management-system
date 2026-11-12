<?php

namespace App\Interfaces;

use App\Dto\BatchDto;

interface BatchRepositoryInterface
{
    public function getAllBatches();
    public function getBatchById($id);
    public function store(BatchDto $dto);
    public function update(BatchDto $dto, $id);
    public function delete($id);
}