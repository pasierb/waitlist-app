<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class SubmissionsExport implements FromQuery
{
    use Exportable;

    public function __construct(public Project $project) {}

    public function query()
    {
        return $this->project->submissions();
    }
}
