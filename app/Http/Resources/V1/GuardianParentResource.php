<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuardianParentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'familyBackgroundId' => $this->family_background_id,
            'firstName' => $this->first_name,
            'middleName' => $this->middle_name,
            'lastName' => $this->last_name,
            'address' => $this->address,
            'contactNumber' => $this->contact_number,
            'occupation' => $this->occupation,
            'employerName' => $this->employer_name,
            'employerAddress' => $this->employer_address,
            'annualGrossIncome' => $this->annual_gross_income,
            'status' => $this->status,
            'relationship' => $this->relationship,
        ];
    }
}
