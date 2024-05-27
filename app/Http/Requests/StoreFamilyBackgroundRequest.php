<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFamilyBackgroundRequest extends FormRequest
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
            'total_gross_income' => 'required|integer',
            'number_of_siblings' => 'required|integer|min:0',
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'student_id' => $this->studentId,
            'total_gross_income' => $this->totalGrossIncome,
            'number_of_siblings' => $this->numberOfSiblings,
        ]);
    }
}
