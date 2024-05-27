<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolRequest extends FormRequest
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
            'name' => 'required|string',
            'address' => 'required|string',
            'school_type' => 'required|string|in:Private,Public',
            'email_address' => 'required|email|unique:schools,email_address',
            'contact_number' => 'required|digits:10',
            'password' => 'required|string|min:8',
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'email_address' => $this->emailAddress,
            'school_type' => $this->schoolType,
            'contact_number' => $this->contactNumber
        ]);
    }
}
