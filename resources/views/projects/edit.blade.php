<x-app-layout>
    <div class="h-full flex flex-col">
        @include('projects.navbar')

        <div class="px-4 grow">
            <div class="grid grid-cols-2 h-full gap-4">
                <section class="col-span-1 border-r pr-4 pt-4">
                    @include('projects.form', ['project' => $project])
                </section>

                <section class="col-span-1 py-4">
                    <div class="mockup-browser border-base-300 border h-full">
                        <div class="mockup-browser-toolbar">
                            <div class="input border-base-300 border">
                                {{route('project.page', $project->slug)}}
                            </div>
                        </div>
                        <div class="border-base-300 flex justify-center border-t h-full min-h-96">
                            <iframe src="{{route('project.page', $project->slug)}}"
                                    id="project-preview"
                                    class="w-full h-full"
                                    title="Preview"></iframe>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
