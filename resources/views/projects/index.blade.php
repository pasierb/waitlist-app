<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th class="text-right">Submissions</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>
                                    <a href="{{route('projects.edit', $project)}}" class="link">
                                        {{ $project->name }}
                                    </a>
                                </td>
                                <td class="text-right">
                                    <a href="{{route('projects.submissions.index', $project)}}" class="link">
                                        {{ $project->submissions()->count() }}
                                    </a>
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('projects.show', $project) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-primary">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{$projects->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
