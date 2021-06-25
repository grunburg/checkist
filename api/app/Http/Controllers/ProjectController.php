<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;

class ProjectController extends Controller
{
    public function show(Project $project): ProjectResource
    {
        return new ProjectResource($project);
    }
}
