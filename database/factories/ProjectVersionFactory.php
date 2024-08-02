<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\ProjectVersion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectVersion>
 */
class ProjectVersionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'color_theme' => 'lofi',
            'block_editor_data' => json_encode([
                'blocks' => []
            ]),
            'success_editor_data' => json_encode([
                'blocks' => []
            ]),
            'published' => 0,
        ];
    }
}
