<?php

namespace App\Http\Controllers;

use App\Models\ProjectVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Cashier;

class CheckoutController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create(Request $request)
    {
        $stripePriceId = config('app.stripe_single_waitlist_price_id');
        $quantity = 1;
        $successUrl = route('checkout-success', [
            'project_version_id' => $request->input('project_version_id'),
        ]).'&session_id={CHECKOUT_SESSION_ID}';

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

        $order = Auth::user()->orders()->create([
            'payment_status' => $session->payment_status,
            'is_completed' => $session->payment_status === 'paid',
        ]);

        if ($request->has('project_version_id')) {
            $version = ProjectVersion::find($request->input('project_version_id'));
            if ($version !== null) {
                DB::transaction(function () use ($order, $version, $request) {
                    $project = $version->project()->first();
                    $order->consume($project);
                    $version->publish();

                    $request->session()->flash('success', 'Payment successful!');

                    return redirect()->route('projects.versions.edit', [
                        'project' => $version->project()->first(),
                        'version' => $version,
                    ]);
                });
            }
        }

        $request->session()->flash('success', 'Payment successful!');

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
