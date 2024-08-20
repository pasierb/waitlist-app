<x-app-layout>
    <div class="navbar bg-base-100 border-b px-4">
        <div class="navbar-start">
            <x-drawer-open-button/>
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

    @if($projects->total() === 0)
        <div class="flex justify-center items-center h-64 w-full h-screen">
            <div class="border rounded-lg p-8 text-center">
                <p class="mb-4">You don't have any projects yet.</p>
                <a href="{{route('projects.create')}}" class="btn btn-primary btn-lg">
                    Create your first project
                </a>
            </div>
        </div>
    @else
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>URL</th>
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
                        @if($project->published_version_id)
                            <a href="{{$project->url()}}" class="link" target="_blank">
                                {{ $project->url() }}
                            </a>
                        @else
                            <span class="text-base-content/70">Not published</span>
                        @endif
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
    @endif
</x-app-layout>
