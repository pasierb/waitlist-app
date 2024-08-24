<?php
$orders = Auth::user()->orders()->get();
?>

<x-app-layout>

<div class="container">
    <h1>{{ __('Your Orders') }}</h1>

    @if($orders->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Project') }}</th>
                    <th>{{ __('Created At') }}</th>
                    <th>{{ __('Consumed At') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>
                            @if ($order->project)
                                <a class="link" href="{{ route('projects.edit', $order->project) }}">{{ $order->project->name }}</a>
                            @if ($order->project->isPublished())
                                <a href="{{ route('project.page', $order->project) }}" class="btn btn-sm btn-ghost ml-2" target="_blank">
                                    <x-heroicon-o-eye class="h-4 w-4 inline-block" />
                                    <span class="sr-only">{{ __('View Published') }}</span>
                                </a>
                            @endif
                            @else
                                {{ __('N/A') }}
                            @endif
                        </td>
                        <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $order->consumed_at ? $order->consumed_at->format('Y-m-d H:i:s') : __('Not consumed') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>{{ __('You have no orders yet.') }}</p>
    @endif
</div>
</x-app-layout>
