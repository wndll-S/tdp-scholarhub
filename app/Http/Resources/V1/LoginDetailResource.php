<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginDetailResource extends JsonResource
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
            'studentId'  => $this->student_id,
            'emailAddress'  => $this->email_address,
            'mobileNumber'  => $this->mobile_number,
            'password'  => $this-> password,
            'student' => new StudentResource($this->whenLoaded('student')),
            'application' => new ApplicationResource($this->whenLoaded('applications'))

        ];
    }
}
