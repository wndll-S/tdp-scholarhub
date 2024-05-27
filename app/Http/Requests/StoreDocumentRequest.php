<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
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
            'document_type' =>'required|string|in:Report Card,Certificate of Enrolment,Birth Certificate,ITR,Tax Exemption,Certificate of Indigency,DSWD Case Study,OFW Contract',
            'file' => 'required|file|mimes:pdf,jpg,png|max:2048'
        ];
    }
    protected function prepareForValidation()
{
    $this->merge([
        'student_id' => $this->studentId,
        'school_id' => $this->schoolId,
        'document_type' => $this->documentType,
    ]);
}
}
