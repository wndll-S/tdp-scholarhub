<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Base rules for initial registration
        $rules = [
            'first_name' => 'required|string|max:50',
            'middle_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
        ];

        // Add additional fields if this is a full registration
        if ($this->isFullRegistration()) {
            $rules = array_merge($rules, [
                'name_ext' => 'nullable|in:Sr.,Jr.,III',
                'birthday' => 'required|date',
                'birth_place' => 'required|string|max:255',
                'sex' => 'nullable|in:male,female',
                'citizenship' => 'required|string|max:255',
                'civil_status' => 'nullable|in:Single,Married,Annulled,Widowed,Separated,Others',
                'ip_affiliation' => 'nullable|string|max:255',
            ]);
        }

        // Address rules
        $rules = array_merge($rules, [
            'barangay' => 'required|string|max:255',
            'city_town' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
        ]);

        // Login details rules
        $rules = array_merge($rules, [
            'email_address' => 'required|string|email|max:255|unique:login_details,email_address',
            'mobile_number' => 'required|string|max:20|unique:login_details,mobile_number',
            'password' => 'required|string|min:8',
        ]);

        // Application rules
        $rules = array_merge($rules, [
            'status' => 'required|string|in:Pending,Approved,Rejected,Initial Screening,Secondary Screening',
            'ranking_pts' => 'required|integer|min:0',
        ]);

        return $rules;
    }

    protected function isFullRegistration(): bool
    {
        // Determine if the request is for full registration based on a query parameter
        return $this->query('registration_type') === 'full';
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'first_name' => $this->input('firstName'),
            'middle_name' => $this->input('middleName'),
            'last_name' => $this->input('lastName'),
            'name_ext' => $this->input('nameExtension'),
            'birthday' => $this->input('birthday'),
            'birth_place' => $this->input('birthPlace'),
            'sex' => $this->input('sex'),
            'citizenship' => $this->input('citizenship'),
            'civil_status' => $this->input('civilStatus'),
            'ip_affiliation' => $this->input('ipAffiliation'),
            'barangay' => $this->input('barangay'),
            'city_town' => $this->input('cityTown'),
            'district' => $this->input('district'),
            'zip_code' => $this->input('zipCode'),
            'email_address' => $this->input('emailAddress'),
            'mobile_number' => $this->input('mobileNumber'),
            'password' => bcrypt($this->input('password')), // Hash the password
            'status' => $this->input('status', 'Pending'),
            'ranking_pts' => $this->input('rankingPts', 0),
        ]);
    }
}
