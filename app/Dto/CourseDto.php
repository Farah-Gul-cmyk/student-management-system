<?php

namespace App\Dto;

class CourseDto
{
    public function __construct(
        public readonly string $title,
        public readonly string $code,
        public readonly ?string $description,
        public readonly ?int $credits
    ) {}

    public static function fromRequest($request): self
    {
        return new self(
            title: $request->validated('title'),
            code: $request->validated('code'),
            description: $request->validated('description'),
            credits: $request->validated('credits') ?? 3
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'code' => $this->code,
            'description' => $this->description,
            'credits' => $this->credits,
        ];
    }
}