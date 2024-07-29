<x-app-layout>
    <x-slot name="header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="{{route('projects.index')}}">{{ __('Projects') }}</a></li>
                <li>{{$project->name}}</li>
            </ul>
        </div>
    </x-slot>

    <div class="py-12">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('projects.form', ['project' => $project])
                </div>
            </div>
    </div>

</x-app-layout>
