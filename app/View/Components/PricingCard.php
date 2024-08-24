<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PricingCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $plan, public array $features) {}

    private function title()
    {
        if ($this->plan == 'single') {
            return 'Single waitlist';
        }

        return '';
    }

    private function selectRoute()
    {
        switch ($this->plan) {
            case 'single':
                return route('checkout');
            case 'free':
                return route('dashboard');
        }
    }

    private function price()
    {
        switch ($this->plan) {
            case 'single':
                return '$'.config('app.single_waitlist_price');
            case 'free':
                return '$0';
        }
    }

    private function isCurrentPlan(): bool
    {
        return false;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pricing-card', [
            'title' => $this->title(),
            'price' => $this->price(),
            'selectRoute' => $this->selectRoute(),
            'isCurrentPlan' => $this->isCurrentPlan(),
        ]);
    }
}
