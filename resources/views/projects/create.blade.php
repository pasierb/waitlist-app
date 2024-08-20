<x-app-layout>
    <div class="w-full px-8 max-w-4xl mt-12">
        <form id="project-form" action="{{route('projects.store')}}"
              method="POST"
              class="flex flex-col gap-2 border rounded-lg p-4">
            @csrf
            @method('POST')
            <x-project-form-fields :project="$project"/>
        </form>
    </div>
</x-app-layout>
