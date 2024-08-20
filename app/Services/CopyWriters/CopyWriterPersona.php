<?php

namespace App\Services\CopyWriters;

class CopyWriterPersona
{
    public function __construct(
        public string $key,
        public string $name,
        public string $description,
        public string $imageUrl,
    )
    {
    }

    public static CopyWriterPersona $tom;
    public static CopyWriterPersona $ella;
    public static CopyWriterPersona $sophia;
    public static CopyWriterPersona $max;

    public static function availablePersonas()
    {
        return [
            'tom' => self::$tom,
            'ella' => self::$ella,
            'sophia' => self::$sophia,
            'max' => self::$max,
        ];
    }

    public static function getPersona(string $key): ?CopyWriterPersona
    {
        return match ($key) {
            'tom' => self::$tom,
            'ella' => self::$ella,
            'sophia' => self::$sophia,
            'max' => self::$max,
            default => null,
        };
    }
}

CopyWriterPersona::$tom = new CopyWriterPersona(
    'tom',
    'Techie Tom',
    <<<EOD
Tom is your tech-savvy, no-nonsense copywriter who gets straight to the point.
He specializes in clear, concise, and jargon-free content that cuts through the fluff and delivers value fast.
Perfect for tech startups, SaaS products, or any brand targeting a knowledgeable audience,
Tom’s direct and efficient tone ensures your message is communicated effectively and without any unnecessary hype.
If you need straightforward, informative copy that resonates with a tech-savvy crowd, Tom is your guy.
EOD,
    asset('img/personas/tom.jpg')
);

CopyWriterPersona::$ella = new CopyWriterPersona(
    'ella',
    'Ella Enthusiast',
    <<<EOD
Ella is your go-to for vibrant, energetic copy that excites and engages.
She specializes in creating upbeat, motivational content that’s perfect for brands looking to build excitement and drive action.
Whether you’re launching a new product or creating a buzz around your brand, Ella’s enthusiastic tone will capture
your audience’s attention and keep them engaged.
EOD,
    asset('img/personas/ella.jpg')
);

CopyWriterPersona::$max = new CopyWriterPersona(
    'max',
    'Max Mentor',
    <<<EOD
Max brings a calm, authoritative voice to your copy, perfect for brands that want to convey trust and expertise.
With years of experience in content strategy, Max specializes in educational, informative copy that builds
credibility and guides your audience toward making informed decisions. Ideal for brands offering professional
services or complex products, Max’s mentor-like tone will reassure and convert.
EOD,
    asset('img/personas/max.jpg')
);

CopyWriterPersona::$sophia = new CopyWriterPersona(
    'sophia',
    'Sophia Storyteller',
    <<<EOD
Sophia weaves narratives that connect on an emotional level. Her warm, conversational tone is ideal for brands that
want to tell a story and build a relationship with their audience. Sophia excels at creating relatable, human-centered
content that draws readers in and keeps them hooked from start to finish. Perfect for lifestyle brands, non-profits,
or any business looking to create a deeper connection with their customers.
EOD,
    asset('img/personas/sophia.jpg')
);
