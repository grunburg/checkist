<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Section;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create()->each(function ($user) {
            Project::factory()->count(2)->create([
                'user_id' => $user->id
            ])->each(function ($project) use ($user) {
                Task::factory()->count(rand(0, 1))->create([
                    'user_id' => $user->id,
                    'parent_id' => null,
                    'taskable_type' => 'project',
                    'taskable_id' => $project->id
                ])->each(function ($task) use ($project, $user) {
                    Task::factory()->count(rand(0, 3))->create([
                        'user_id' => $user->id,
                        'parent_id' => $task->id,
                        'taskable_type' => 'project',
                        'taskable_id' => $project->id
                    ]);
                });
                Section::factory()->count(rand(0, 2))->create([
                    'user_id' => $user->id,
                    'project_id' => $project->id
                ])->each(function ($section) use ($user) {
                    Task::factory()->count(rand(0, 1))->create([
                        'user_id' => $user->id,
                        'parent_id' => null,
                        'taskable_type' => 'section',
                        'taskable_id' => $section->id
                    ])->each(function ($task) use ($section, $user) {
                        Task::factory()->count(rand(0, 3))->create([
                            'user_id' => $user->id,
                            'parent_id' => $task->id,
                            'taskable_type' => 'section',
                            'taskable_id' => $section->id
                        ]);
                    });
                });
            });
        });
    }
}
