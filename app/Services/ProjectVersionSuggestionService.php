<?php

namespace App\Services;

use App\Models\ProjectVersion;
use App\Services\CopyWriters\CopyWriterPersona;

abstract class ProjectVersionSuggestionService
{
    abstract public function suggestVersion(string $projectDescription, CopyWriterPersona $persona): ProjectVersion;
}
