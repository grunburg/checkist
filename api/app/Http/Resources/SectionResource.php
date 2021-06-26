<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->user->id,
            'title' => $this->title,
            'tasks' => TaskResource::collection($this->tasks->load('subtasks')),
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
