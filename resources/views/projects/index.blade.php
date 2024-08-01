<x-app-layout>
    <div class="navbar bg-base-100 border-b px-4">
        <div class="navbar-start">
            <x-drawer-open-button />
            {{__('Projects')}}
        </div>
        <div class="navbar-center hidden lg:flex">
        </div>
        <div class="navbar-end">
            <a href="{{route('projects.create')}}" class="btn btn-sm btn-primary">
                <x-heroicon-o-plus class="h-4"/>
                Create
            </a>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Publish URL</th>
            <th class="text-right">Submissions</th>
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
                <td>
                    <a href="{{route('projects.show', $project)}}" class="link" target="_blank">
                        {{ $project->url() }}
                    </a>
                </td>
                <td class="text-right">
                    <a href="{{route('projects.submissions.index', $project)}}" class="link">
                        {{ $project->submissions()->count() }}
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$projects->links()}}
</x-app-layout>
