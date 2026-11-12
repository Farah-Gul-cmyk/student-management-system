<?php

namespace App\Dto;

class EnrollmentDto
{
    public function __construct(
        public readonly int $student_id,
        public readonly int $batch_id,
        public readonly ?string $enrollment_date
    ) {}

    public static function fromRequest($request): self
    {
        return new self(
            student_id: $request->validated('student_id'),
            batch_id: $request->validated('batch_id'),
            enrollment_date: $request->validated('enrollment_date')
        );
    }

    public function toArray(): array
    {
        return [
            'student_id' => $this->student_id,
            'batch_id' => $this->batch_id,
            'enrollment_date' => $this->enrollment_date,
        ];
    }
}