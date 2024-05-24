<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SchoolResource extends JsonResource
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
            'name' => $this->name,
            'address' => $this->address,
            'schoolType' => $this->school_type,
            'emailAddress' => $this->email_address,
            'contactNumber' => $this->contact_number,
            'password' => $this->password,
            'educationDetails' => EducationDetailResource::collection($this->whenLoaded('education_details')),
            'documents' => DocumentResource::collection($this->whenLoaded('documents')),
            'announcements' => DocumentResource::collection($this->whenLoaded('announcements')),
        ];
    }
}
