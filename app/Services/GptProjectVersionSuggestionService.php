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
            'response_format' => [
                'type' => 'json_schema',
                'json_schema' => GptProjectVersionSuggestionService::$blockEditorResponseSchema,
            ],
        ]);

        $data = json_decode($result->choices[0]->message->content);

        return new ProjectVersion([
            'color_theme' => 'lofi',
            'block_editor_data' => json_encode([
                'blocks' => $data->blocks,
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
You are a marketing expert for. Your goal is to design a landing page for a not launched yet product.
That page should be informative and encourage users to leave email to receive information about product launch.
Avoid over-hyping product, be authentic and relatable.

Good landing page should have:

1. Compelling Value Proposition

• Clear Headline & Subheading: The page must clearly communicate what the product is and why it matters. This includes a concise headline that highlights the primary benefit or unique selling proposition, along with a subheading that elaborates on this value.
• Product Benefits: Use bullet points to briefly describe the key features and benefits that set your product apart from competitors.

2. Visually Engaging Design

• High-Quality Visuals: Use images, mockups, or even short videos that showcase the product. This helps potential customers visualize what they are signing up for.
• Clean and Simple Layout: The design should be uncluttered, with a focus on making the content easily digestible. Simplicity enhances user experience and keeps the focus on the main CTA.

3. Strong Call-to-Action (CTA)

• Prominent and Clear CTA: The CTA button should stand out visually, using contrasting colors and action-oriented text like “Join the Waitlist,” “Get Early Access,” or “Be the First to Know.”
• Minimal Form Fields: To reduce friction, keep the sign-up form short. Often, just an email field is sufficient, but you may add other fields if they provide value without overwhelming the user.

4. Sense of Urgency and Scarcity

• Limited Spots or Time-Sensitive Offers: Convey urgency by emphasizing the exclusivity of the offer. For instance, indicate limited availability or use a countdown timer to create a sense of time pressure.
• Incentives: Offer incentives such as discounts, exclusive content, or early access to encourage immediate sign-ups.

5. Social Proof and Credibility

• Testimonials and Reviews: Include testimonials from early users, industry experts, or influencers. This builds trust and validates the value of the product.
• Media Mentions: If applicable, highlight any press coverage or mentions in reputable sources to further establish credibility.

6. SEO and Search Engine Optimization

• Optimized Content: Ensure that the page content, titles, and meta descriptions are optimized for search engines to attract organic traffic.
• Relevant Keywords: Incorporate keywords that your target audience is likely to use when searching for products like yours.

8. Privacy and Trust Signals

• Privacy Assurances: Clearly state how you will use the user’s information and ensure them that their data is secure. This builds trust and reduces hesitation.
• GDPR Compliance: If applicable, ensure that your page complies with regulations like GDPR, which includes giving users control over their data.

You will be given a product description. Output as markdown formated text.
EOD;
    }

    private static $blockEditorResponseSchema = [
        'name' => 'editor_blocks',
        'strict' => false,
        'schema' => [
            "type" => "object",
            "properties" => [
                "blocks" => [
                    "oneOf" => [
                        [
                            "type" => "object",
                            "properties" => [
                                "type" => [
                                    "type" => "string",
                                    "enum" => ["paragraph"]
                                ],
                                "data" => [
                                    "type" => "object",
                                    "properties" => [
                                        "text" => [
                                            "type" => "string"
                                        ]
                                    ],
                                    "required" => ["text"]
                                ]
                            ],
                            "required" => ["type", "data"]
                        ],
                        [
                            "type" => "object",
                            "properties" => [
                                "type" => [
                                    "type" => "string",
                                    "enum" => ["header"]
                                ],
                                "data" => [
                                    "type" => "object",
                                    "properties" => [
                                        "text" => [
                                            "type" => "string"
                                        ],
                                        "level" => [
                                            "type" => "integer",
                                            "enum" => [1, 2, 3, 4]
                                        ]
                                    ],
                                    "required" => ["text", "level"]
                                ]
                            ],
                            "required" => ["type", "data"]
                        ],
                        [
                            "type" => "object",
                            "properties" => [
                                "type" => [
                                    "type" => "string",
                                    "enum" => ["list"]
                                ],
                                "data" => [
                                    "type" => "object",
                                    "properties" => [
                                        "style" => [
                                            "type" => "string",
                                            "enum" => ["ordered", "unordered"]
                                        ],
                                        "items" => [
                                            "type" => "array",
                                            "items" => [
                                                "type" => "string"
                                            ]
                                        ]
                                    ],
                                    "required" => ["style", "items"]
                                ]
                            ],
                            "required" => ["type", "data"]
                        ],
                        [
                            "type" => "object",
                            "properties" => [
                                "type" => [
                                    "type" => "string",
                                    "enum" => ["text-input"]
                                ],
                                "data" => [
                                    "type" => "object",
                                    "properties" => [
                                        "label" => [
                                            "type" => "string"
                                        ],
                                        "placeholder" => [
                                            "type" => "string"
                                        ]
                                    ],
                                    "required" => ["label", "placeholder"]
                                ]
                            ],
                            "required" => ["type", "data"]
                        ],
                        [
                            "type" => "object",
                            "properties" => [
                                "type" => [
                                    "type" => "string",
                                    "enum" => ["email-input"]
                                ],
                                "data" => [
                                    "type" => "object",
                                    "properties" => [
                                        "button" => [
                                            "description" => "Button label",
                                            "type" => "string"
                                        ],
                                        "placeholder" => [
                                            "description" => "Input placeholder",
                                            "type" => "string"
                                        ]
                                    ],
                                    "required" => ["buttonLabel", "placeholder"]
                                ]
                            ],
                            "required" => ["type", "data"]
                        ],
                        [
                            "type" => "object",
                            "properties" => [
                                "type" => [
                                    "type" => "string",
                                    "enum" => ["faq"]
                                ],
                                "data" => [
                                    "type" => "object",
                                    "properties" => [
                                        "items" => [
                                            "type" => "array",
                                            "items" => [
                                                "type" => "object",
                                                "properties" => [
                                                    "question" => [
                                                        "type" => "string"
                                                    ],
                                                    "answer" => [
                                                        "type" => "string"
                                                    ]
                                                ],
                                                "required" => ["question", "answer"]
                                            ]
                                        ]
                                    ],
                                    "required" => ["items"]
                                ]
                            ],
                            "required" => ["type", "data"]
                        ],
                        [
                            "type" => "object",
                            "properties" => [
                                "type" => [
                                    "type" => "string",
                                    "enum" => ["features"]
                                ],
                                "data" => [
                                    "type" => "object",
                                    "properties" => [
                                        "items" => [
                                            "type" => "array",
                                            "items" => [
                                                "type" => "object",
                                                "properties" => [
                                                    "headline" => [
                                                        "type" => "string"
                                                    ],
                                                    "description" => [
                                                        "type" => "string"
                                                    ]
                                                ],
                                                "required" => ["headline", "description"]
                                            ]
                                        ]
                                    ],
                                    "required" => ["items"]
                                ]
                            ],
                            "required" => ["type", "data"]
                        ]
                    ]
                ]
            ],
            "required" => ["blocks"]
        ]
    ];
}

