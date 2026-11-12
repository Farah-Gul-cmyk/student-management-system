<?php

namespace App\Dto;

class BatchDto
{
    public function __construct(
        public readonly string $name,
        public readonly int $course_id,
        public readonly ?string $start_date,
        public readonly ?string $end_date
    ) {}

    public static function fromRequest($request): self
    {
        return new self(
            name: $request->validated('name'),
            course_id: $request->validated('course_id'),
            start_date: $request->validated('start_date'),
            end_date: $request->validated('end_date')
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'course_id' => $this->course_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];
    }
}