@extends('layouts.landing')

@section('content')
    <div class="container mx-auto py-12">
        <div class="prose mx-auto">
            <h1>Contact</h1>

            <h2>Hey there!</h2>

            <p>
                I'm Michal, the founder of LaunchLoom, and I'm here to help you every step of the way.
                Whether you have questions, need support, or just want to share your feedback, I'd love to hear from
                you.
            </p>
            <p>
                Reach out to me directly at <a
                    href="mailto:{{ config('app.contact_email') }}">{{ config('app.contact_email') }}</a>, and I'll get
                back to you as soon as possible.
                Your success is my priority, and I'm excited to help you create amazing waitlist landing pages.
            </p>
        </div>
    </div>
@endsection
