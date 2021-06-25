<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SectionController;

Route::get('/sections/{section:id}', [SectionController::class, 'show']);
Route::get('/projects/{project:id}', [ProjectController::class, 'show']);
