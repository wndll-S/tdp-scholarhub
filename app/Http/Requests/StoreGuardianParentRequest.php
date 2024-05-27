<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuardianParentRequest extends FormRequest
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
            'family_background_id' => 'required|exists:family_backgrounds,id',
            'first_name' => 'required|string|max:50',
            'middle_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'address' => 'required|string',
            'contact_number' => 'required|digits:10',
            'occupation' => 'required|string|max:50',
            'employer_name' => 'required|string|max:100',
            'employer_address' => 'required|string|max:100',
            'annual_gross_income' => 'required|integer',
            'status' => 'required|string|in:Living,Deceased',
            'relationship' => 'required|string|in:Father,Mother,Legal Guardian',
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'family_background_id' => $this->familyBackgroundId,
            'first_name' => $this->firstName,
            'middle_name' => $this->middleName,
            'last_name' => $this->lastName,
            'contact_number' => $this->contactNumber,
            'employer_name' => $this->employerName,
            'employer_address' => $this->employerAddress,
            'annual_gross_income' => $this->annualGrossIncome,
        ]);
    }
}
