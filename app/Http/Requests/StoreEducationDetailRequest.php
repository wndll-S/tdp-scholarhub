<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student_id' => 'required|exists:students,id',
            'school_id' => 'required|exists:schools,id',
            'lrn' => 'nullable|string|max:12',
            'course' => 'required|string|max:50',
            'major' => 'required|string|max:50',
            'year_level' => 'required|integer|min:1|max:5',
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'student_id' => $this->studentId,
            'school_id' => $this->schoolId,
            'year_level' => $this->yearLevel,
        ]);
    }
}
