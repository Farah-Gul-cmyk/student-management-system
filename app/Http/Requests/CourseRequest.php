<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
{
    return true;
}

public function rules(): array
{
    $courseId = $this->route('course'); 
    
    return [
        'title' => 'required|string|max:255',
        'code' => 'required|string|max:50|unique:courses,code,' . $courseId,
        'description' => 'nullable|string',
        'credits' => 'nullable|integer|min:1|max:5',
    ];
}
}
