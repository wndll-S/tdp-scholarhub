<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
            'username' => 'required|string|unique:admins,username|max:50',
            'email_address' => 'required|email|unique:admins,email_address|max:50',
            'password' => 'required|string',
            'role' => 'required|string|in:Super Admin,Screener,Reports Viewer',
            'status' => 'required|string|in:Suspended,Active,Deleted',
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'email_address' => $this->emailAddress,
        ]);
    }
}
