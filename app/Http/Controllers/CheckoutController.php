<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;
use Spatie\Url\Url;

class CheckoutController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create()
    {
        $stripePriceId = config('app.stripe_lifetime_access_price_id');
        $quantity = 1;
        $successUrl = route('checkout-success').'?session_id={CHECKOUT_SESSION_ID}';

        return Auth::user()->checkout([$stripePriceId => $quantity], [
            'success_url' => $successUrl,
            'cancel_url' => route('checkout-cancel'),
        ]);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
    }

    /**
     * Display the resource.
     */
    public function show(Request $request)
    {
        $sessionId = $request->get('session_id');
        if ($sessionId === null) {
            return redirect()->route('checkout-cancel');
        }

        $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);
        if ($session->payment_status !== 'paid') {
            return redirect()->route('checkout-cancel');
        }

        Auth::user()->orders()->create([
            'payment_status' => $session->payment_status,
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
