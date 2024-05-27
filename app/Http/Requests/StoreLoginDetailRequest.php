<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginDetailRequest extends FormRequest
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
            'email_address' => 'required|email|unique:login_details,email_address|max:50',
            'mobile_number' => 'required|digits:10|unique:login_details,mobile_number',
            'password' => 'required|string',
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'student_id' => $this->studentId,
            'email_address' => $this->emailAddress,
            'mobile_number' => $this->mobileNumber,
        ]);
    }
}
