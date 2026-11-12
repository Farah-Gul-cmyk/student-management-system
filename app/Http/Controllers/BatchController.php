<?php

namespace App\Http\Controllers;

use App\Interfaces\BatchRepositoryInterface;
use App\Interfaces\CourseRepositoryInterface;
use App\Http\Requests\BatchRequest;
use App\Dto\BatchDto;

class BatchController extends Controller
{
    protected $batchRepository;
    protected $courseRepository;

    public function __construct(
        BatchRepositoryInterface $batchRepository,
        CourseRepositoryInterface $courseRepository
    ) {
        $this->batchRepository = $batchRepository;
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        $batches = $this->batchRepository->getAllBatches();
        return view('batches.index', compact('batches'));
    }

    public function create()
    {
        $courses = $this->courseRepository->getAllCourses();
        return view('batches.create', compact('courses'));
    }

    public function store(BatchRequest $request)
    {
        $dto = BatchDto::fromRequest($request);
        $this->batchRepository->store($dto);

        return redirect()->route('batches.index')->with('success', 'Batch added successfully.');
    }

    public function edit($id)
    {
        $batch = $this->batchRepository->getBatchById($id);
        $courses = $this->courseRepository->getAllCourses();
        return view('batches.edit', compact('batch', 'courses'));
    }

    public function update(BatchRequest $request, $id)
    {
        $dto = BatchDto::fromRequest($request);
        $this->batchRepository->update($dto, $id);

        return redirect()->route('batches.index')->with('success', 'Batch updated successfully.');
    }

    public function destroy($id)
    {
        $this->batchRepository->delete($id);
        return redirect()->route('batches.index')->with('success', 'Batch deleted successfully.');
    }
}