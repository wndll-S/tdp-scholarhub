<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducationDetailResource extends JsonResource
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
            'studentId' => $this->student_id,
            'schoolId' => $this->school_id,
            'lrn' => $this->lrn,
            'course' => $this->course,
            'major' => $this->major,
            'yearLevel' => $this->year_level,
            'school' => new SchoolResource($this->whenLoaded('school')),
            'student' => new StudentResource($this->whenLoaded('student')),
        ];
    }
}
