<x-app-layout>
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
</x-app-layout>
