<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tasks' => TaskResource::collection($this->tasks->load('subtasks')),
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
