<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user' => $this->user->id,
            'title' => $this->title,
            'tasks' => TaskResource::collection($this->tasks->load('subtasks')),
            'sections' => SectionResource::collection($this->sections),
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
