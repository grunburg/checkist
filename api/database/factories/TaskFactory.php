<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->text(50),
            'description' => $this->faker->paragraph(1),
            'completed' => $this->faker->boolean,
            'due_at' => null
        ];
    }
}
