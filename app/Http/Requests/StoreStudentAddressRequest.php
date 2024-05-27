<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentAddressRequest extends FormRequest
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
            'barangay' => 'required|string',
            'city_town' => 'required|string',
            'district' => 'required|integer',
            'zip_code'=> 'required|integer',
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'student_id' => $this->studentId,
            'city_town' => $this->cityTown,
            'zip_code' => $this->zipCode,
        ]);
    }
}
