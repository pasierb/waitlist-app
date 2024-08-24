<?php

namespace App\View\Components;

use App\Models\ProjectVersion;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SingleProjectPublishPricingCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ProjectVersion $projectVersion)
    {
        $this->price_id = config('app.stripe_single_waitlist_price_id');
        $this->price = config('app.single_waitlist_price');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.single-project-publish-pricing-card', [
            'price' => $this->price,
            'projectVersion' => $this->projectVersion,
        ]);
    }
}
