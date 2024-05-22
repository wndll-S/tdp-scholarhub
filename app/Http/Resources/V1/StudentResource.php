<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Resource;
class StudentResource extends JsonResource
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
            'firstName' => $this->first_name,
            'middleName' => $this->middle_name,
            'lastName' => $this->last_name,
            'nameExtension' => $this->name_ext,
            'birthday' => $this->birthday,
            'birthPlace' => $this->birth_place,
            'sex' => $this->sex,
            'citizenship' => $this->citizenship,
            'civilStatus' => $this->civil_status,
            'ipAffiliation' => $this->ip_affiliation,
        ];
    }
}
