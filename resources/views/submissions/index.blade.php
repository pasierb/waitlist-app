<x-app-layout>
    <x-slot name="header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="{{route('projects.index')}}">{{ __('Projects') }}</a></li>
                <li><a href="{{route('projects.edit', $project)}}">{{$project->name}}</a></li>
                <li>{{ __('Submissions') }}</li>
            </ul>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Email</th>
                            <th>Data</th>
                            <th>Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($submissions as $submission)
                            <tr>
                                <td>{{$submission->email}}</td>
                                <td>{{$submission->data}}</td>
                                <td>{{$submission->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{$submissions->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
