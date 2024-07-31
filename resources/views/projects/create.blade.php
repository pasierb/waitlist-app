<x-app-layout>
    <div class="w-full px-8 max-w-4xl mx-auto">
        <form id="project-form" action="{{route('projects.store')}}"
              method="POST"
              x-data="{ projectName: '{{$project->name}}', projectSlug: '{{$project->slug}}' }"
              x-init="$watch('projectName', value => projectSlug = value.toLowerCase().replace(/[^a-z0-9]/g, '-'))"
              class="flex flex-col gap-2 border rounded-lg p-4">
            @csrf
            @method('POST')
            @include('projects.form-fields')
        </form>
    </div>
</x-app-layout>
