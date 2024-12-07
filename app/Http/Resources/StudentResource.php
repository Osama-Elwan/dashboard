<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'student_code'=>$this->code,
            'student_name'=>$this->name,
            'student_email'=>$this->email,
            'student_department'=>$this->department->dept_name,
        ];
    }
}
