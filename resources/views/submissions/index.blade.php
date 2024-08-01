<x-app-layout>
    @include('projects.navbar')

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
