<?php

namespace App\Http\Controllers;

use App\Http\Resources\SectionResource;
use App\Models\Section;

class SectionController extends Controller
{
    public function show(Section $section): SectionResource
    {
        return new SectionResource($section);
    }
}
