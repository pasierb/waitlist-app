<?php

namespace App\Services;

use App\Models\ProjectVersion;

abstract class ProjectVersionSuggestionService
{
    abstract public function suggestVersion(string $projectDescription): ProjectVersion;
}
