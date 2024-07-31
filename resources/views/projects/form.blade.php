<?php
$themes = [
    "light",
    "dark",
    "cupcake",
    "bumblebee",
    "emerald",
    "corporate",
    "synthwave",
    "retro",
    "cyberpunk",
    "valentine",
    "halloween",
    "garden",
    "forest",
    "aqua",
    "lofi",
    "pastel",
    "fantasy",
    "wireframe",
    "black",
    "luxury",
    "dracula",
    "cmyk",
    "autumn",
    "business",
    "acid",
    "lemonade",
    "night",
    "coffee",
    "winter",
    "dim",
    "nord",
    "sunset",
];
?>

<style>
    .codex-editor {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23000000' fill-opacity='0.05'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E")
    }
</style>


<div x-data="{colorTheme: '{{$version->color_theme}}', selectedTab: 'settings'}"
     x-init="$watch('colorTheme', saveProjectVersion)"
     class="h-full">

    <div role="tablist" class="tabs tabs-boxed mb-8">
        <a role="tab" class="tab"
           x-bind:class="selectedTab === 'settings' ? 'tab-active' : ''"
           x-on:click="selectedTab = 'settings'">
            <x-heroicon-o-cog-6-tooth class="w-4 h-4"/>
            Settings
        </a>
        <a role="tab" class="tab"
           x-bind:class="selectedTab === 'editor' ? 'tab-active' : ''"
           x-on:click="selectedTab = 'editor'">
            <x-heroicon-o-paint-brush class="w-4 h-4"/>
            Design
        </a>
    </div>

    <!-- Settings tab -->
    <div x-show="selectedTab === 'settings'">
        <form id="project-form" action="{{route('projects.update', $project)}}"
              method="POST"
              x-ref="form"
              class="flex flex-col gap-2 border rounded-lg p-4">
            @csrf
            @method('PUT')

            <div class="form-control w-6/12">
                <div class="label">
                    <span class="label-text">Name</span>
                </div>
                <input type="text"
                       name="name"
                       value="{{$project->name}}"
                       class="input input-bordered"/>
                <div class="label">
                    <span class="label-text-alt">This will appear as a page title</span>
                </div>
            </div>

            <div class="form-control w-6/12">
                <div class="label">
                    <span class="label-text">Slug</span>
                </div>
                <input type="text"
                       name="slug"
                       value="{{$project->slug}}"
                       class="input input-bordered"/>
            </div>

            <div class="flex flex-row justify-end gap-2 border-t mt-4 pt-4">
                <a href="{{route('projects.index')}}"
                   class="btn">
                    Cancel
                </a>

                <button type="submit"
                        class="btn btn-primary">
                    Save
                </button>
            </div>
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
                        <p class="text-sm">Once you delete a repository, there is no going back. Please be certain.</p>
                    </div>
                    <button type="submit" class="btn btn-error">
                        <x-heroicon-o-trash class="w-4 h-4"/>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Design tab -->
    <div class="flex flex-col gap-4 border rounded-lg p-4" x-show="selectedTab === 'editor'">
        <form id="project-version-form">
            <input type="hidden"
                   name="color_theme"
                   value="{{$version->color_theme}}"
                   x-model="colorTheme"/>
            <input type="hidden"
                   name="block_editor_data"
                   value="{{$version->block_editor_data}}"/>
        </form>

        <div class="form-control">
            <div class="label">
                <span class="label-text">Theme</span>
            </div>
            <div class="flex flex-row bg-base-100 justify-between w-4/12 btn"
                 x-bind:data-theme="colorTheme"
                 onclick="my_modal_1.showModal()"
                 role="button">
                <span x-text="colorTheme"></span>
                <div class="flex flex-row gap-1">
                    <div class="w-2 h-6 bg-primary"></div>
                    <div class="w-2 h-6 bg-secondary"></div>
                    <div class="w-2 h-6 bg-accent"></div>
                    <div class="w-2 h-6 bg-neutral"></div>
                </div>
            </div>
        </div>

        <dialog id="my_modal_1" class="modal">
            <div class="modal-box w-8/12 max-w-4xl">
                <div class="grid grid-cols-3 gap-2">
                    @foreach($themes as $theme)
                        <x-theme-button
                            x-on:click="colorTheme = '{{$theme}}', my_modal_1.close()"
                            :theme="$theme"/>
                    @endforeach
                </div>
                <div class="modal-action">
                    <button class="btn" onclick="my_modal_1.close()">Close</button>
                </div>
            </div>
        </dialog>
        <div id="editorjs"
             data-theme="lofi"
             class="prose border-dashed border-2"
             data-data="{{$version->block_editor_data}}">
        </div>
    </div>
</div>

<x-slot:scripts>
    @vite('resources/js/block-editor.js')
    <script>
        const form = document.querySelector('#project-version-form');
        const previewIframe = document.querySelector('#project-preview')

        function confirmDelete($event) {
            const name = form.querySelector('[name="name"]').value;

            if (!confirm(`Are you sure you want to delete "${name}"?`)) {
                $event.preventDefault();
            }
        }

        function saveProjectVersion() {
            window.axios.post(`/projects/{{$project->id}}/versions/{{$version->id}}`, {
                _method: 'PUT',
                color_theme: form.querySelector('[name="color_theme"]').value,
                block_editor_data: form.querySelector('[name="block_editor_data"]').value,
            }).then(() => {
                const url = new URL(previewIframe.src);
                url.searchParams.set('preview', Date.now());

                previewIframe.src = url.toString();
            });

        }

        document.addEventListener('block-editor-change', (event) => {
            const data = event.detail.data;
            form.querySelector('input[name="block_editor_data"]').value = JSON.stringify(data);

            saveProjectVersion();
        });
    </script>
</x-slot:scripts>
