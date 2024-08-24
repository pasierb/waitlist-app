<?php

namespace App\View\Components;

use App\Models\ProjectVersion;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectPublishConfirmationDialog extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ProjectVersion $projectVersion)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.project-publish-confirmation-dialog');
    }
}
