<x-app-layout>
    @include('projects.navbar')

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
</x-app-layout>
