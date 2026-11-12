<?php

namespace App\Http\Controllers;

use App\Interfaces\EnrollmentRepositoryInterface;
use App\Interfaces\StudentRepositoryInterface;
use App\Interfaces\BatchRepositoryInterface;
use App\Http\Requests\EnrollmentRequest;
use App\Dto\EnrollmentDto;

class EnrollmentController extends Controller
{
    protected $enrollmentRepository;
    protected $studentRepository;
    protected $batchRepository;

    public function __construct(
        EnrollmentRepositoryInterface $enrollmentRepository,
        StudentRepositoryInterface $studentRepository,
        BatchRepositoryInterface $batchRepository
    ) {
        $this->enrollmentRepository = $enrollmentRepository;
        $this->studentRepository = $studentRepository;
        $this->batchRepository = $batchRepository;
    }

    public function index()
    {
        $enrollments = $this->enrollmentRepository->getAllEnrollments();
        return view('enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $students = $this->studentRepository->getAllStudents();
        $batches = $this->batchRepository->getAllBatches();
        return view('enrollments.create', compact('students', 'batches'));
    }

    public function store(EnrollmentRequest $request)
    {
        $dto = EnrollmentDto::fromRequest($request);
        $this->enrollmentRepository->store($dto);

        return redirect()->route('enrollments.index')->with('success', 'Student enrolled successfully.');
    }

    public function edit($id)
    {
        $enrollment = $this->enrollmentRepository->getEnrollmentById($id);
        $students = $this->studentRepository->getAllStudents();
        $batches = $this->batchRepository->getAllBatches();
        return view('enrollments.edit', compact('enrollment', 'students', 'batches'));
    }

    public function update(EnrollmentRequest $request, $id)
    {
        $dto = EnrollmentDto::fromRequest($request);
        $this->enrollmentRepository->update($dto, $id);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
    }

    public function destroy($id)
    {
        $this->enrollmentRepository->delete($id);
        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
    }
}