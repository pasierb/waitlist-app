<x-app-layout>
    <div class="h-full flex flex-col">
        @include('projects.navbar')

        <div class="px-4 grow max-w-5xl">

            <div class="h-full">
                <div>
                    <form id="project-form" action="{{route('projects.update', $project)}}"
                          method="POST"
                          x-data="{ projectName: '{{$project->name}}', projectSlug: '{{old('slug') ?? $project->slug}}' }"
                          x-ref="form"
                          class="flex flex-col gap-2 rounded-lg p-4">
                        @csrf
                        @method('PUT')
                        <x-project-form-fields :project="$project"/>
                    </form>

                    <div class="mt-12">
                        <h2 class="text-lg font-semibold">
                            Danger zone
                        </h2>

                        <div class="border border-error rounded-lg px-4 py-2 mt-4">
                            <form action="{{route('projects.destroy', $project)}}" method="POST"
                                  class="flex flex-row justify-between items-center"
                                  x-on:submit="confirmDelete($event)">
                                @csrf
                                @method('DELETE')

                                <div class="grow">
                                    <strong>Delete this project</strong>
                                    <p class="text-sm">Once you delete a repository, there is no going back. Please be
                                        certain.</p>
                                </div>
                                <button type="submit" class="btn btn-error">
                                    <x-heroicon-o-trash class="w-4 h-4"/>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            const projectForm = document.querySelector('#project-form');

            function confirmDelete($event) {
                const name = projectForm.querySelector('[name="name"]').value;

                if (!confirm(`Are you sure you want to delete "${name}"?`)) {
                    $event.preventDefault();
                }
            }
        </script>
    @endpush
</x-app-layout>
