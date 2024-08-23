<?php
$orders = Auth::user()->orders()->get();
?>

<x-app-layout>

<div class="container">
    <h1>{{ __('Your Orders') }}</h1>

    @if($orders->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('Order ID') }}</th>
                    <th>{{ __('Date') }}</th>
                    <th>{{ __('Total') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-primary">{{ __('View') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>{{ __('You have no orders yet.') }}</p>
    @endif
</div>
</x-app-layout>
