<x-app-layout>
    @include('projects.navbar')

    <div class="px-4 py-2 border-b flex flex-row justify-between">
        <div></div>
        <div>
            <a href="{{route('projects.submissions.export', $project)}}" class="btn btn-sm">
                @svg('heroicon-o-arrow-down-on-square', 'h-4 w-4')
            </a>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Email</th>
            <th>Data</th>
            <th>Created at</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($submissions as $submission)
            <tr>
                <td>{{$submission->email}}</td>
                <td>{{$submission->data}}</td>
                <td>{{$submission->created_at}}</td>
                <td>
                    <form action="{{route('projects.submissions.destroy', [$project, $submission])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-error btn-sm">
                            <x-heroicon-o-trash class="w-4 h-4"/>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$submissions->links()}}
</x-app-layout>
