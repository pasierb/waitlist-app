<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '12345678',
        ]);

        Project::factory()->create([
            'name' => 'Test Project',
            'slug' => 'test-project',
            'user_id' => $user->id,
            'color_theme' => 'cyberpunk',
            'block_editor_data' => json_encode([
                'time' => 1722165676318,
                'blocks' => [
                    [
                        'type' => 'header',
                        'data' => [
                            'text' => 'Welcome to the Test Project!',
                            'level' => 1,
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'text' => 'Hello, world!',
                        ],
                    ],
                    [
                        'type' => 'email-input',
                        'data' => [
                            'placeholder' => 'Enter your email',
                            'button' => 'Subscribe',
                        ],
                    ]
                ],
            ]),
        ]);
    }
}
