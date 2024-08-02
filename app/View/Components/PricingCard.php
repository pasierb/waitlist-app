<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class PricingCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $plan, public array $features)
    {
    }

    private function title() {
        if ($this->plan == 'lifetime') {
            return 'Premium';
        }

        if ($this->plan == 'free') {
            return 'Free';
        }
    }

    private function selectRoute() {
        switch($this->plan) {
            case 'lifetime':
                return route('checkout');
            case 'free':
                return route('dashboard');
        }
    }

    private function price() {
        switch($this->plan) {
            case 'lifetime':
                return '€65';
            case 'free':
                return '$0';
        }
    }

    private function isCurrentPlan(): bool
    {
        if (!Auth::user()) return false;

        if ($this->plan == 'lifetime' && Auth::user()->isPremium()) {
            return true;
        }

        return true;
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
