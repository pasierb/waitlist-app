<?php

namespace App\Services;

use App\Models\ProjectVersion;
use OpenAI\Laravel\Facades\OpenAI;

class GptProjectVersionSuggestionService extends ProjectVersionSuggestionService
{
    public function suggestVersion(string $projectDescription): ProjectVersion
    {
        return $this->prompt($projectDescription);
    }

    private function prompt(string $productDescription): ProjectVersion
    {
        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'system', 'content' => $this->getSystemMessage()],
                ['role' => 'user', 'content' => $productDescription],
            ],
            'response_format' => ['type' => 'json_object'],
        ]);
        $data = json_decode($result->choices[0]->message->content);

        return new ProjectVersion([
            'color_theme' => 'lofi',
            'block_editor_data' => json_encode([
                'blocks' => [
                    [
                        'type' => 'header',
                        'data' => [
                            'level' => 1,
                            'text' => $data->title,
                        ]
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'text' => $data->description,
                        ]
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'text' => $data->pitch,
                        ]
                    ],
                    [
                        'type' => 'email-input',
                        'data' => [
                            'placeholder' => 'Enter your email',
                            'button' => $data->buttonLabel,
                        ]
                    ]
                ]
            ]),
            'success_editor_data' => json_encode([
                'blocks' => [
                    [
                        'type' => 'header',
                        'data' => [
                            'level' => 1,
                            'text' => 'Thanks for signing up!',
                        ]
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'text' => 'You\'ll receive an email shortly with more information.',
                        ]
                    ]
                ]
            ])
        ]);
    }

    private function getSystemMessage()
    {
        return <<<EOD
You are marketing assistant that helps crafting great wait-list landing pages. Be honest and down to ground.
Keep in mind that those products are not launched.
You are given a product description and based on that you suggest following information:

1. `title` - Catchy title that may or may not include product name (use your judgement)
2. `description` - Quick, 1 paragraph description of the product aka "offer value"
3. `pitch` - Quick, 1 paragraph statement why viewers should be interested in leaving his/hers email
4. `buttonLabel` - Label text that will appeat on the button to submit the form.

Output everything as a stringifies plain JSON object.
EOD;
    }
}
