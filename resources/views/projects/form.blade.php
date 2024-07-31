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

$tabs = [
    [
        'icon' => 'cog-6-tooth',
        'label' => 'Settings',
        'key' => 'settings',
    ],
    [
        'icon' => 'paint-brush',
        'label' => 'Design',
        'key' => 'editor',
    ],
];

$editorModes = [
    'form',
    'success',
];
?>

<style>
    .codex-editor {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23000000' fill-opacity='0.05'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E")
    }

    .ce-header {
        text-align: center;
    }

    .ce-paragraph {
        text-align: center;
    }
</style>


<div x-data="{colorTheme: '{{$version->color_theme}}', selectedTab: 'settings', editorMode: 'form'}"
     x-init="$watch('colorTheme', saveProjectVersion), $watch('editorMode', () => $dispatch('editor-mode-change', editorMode))"
     class="h-full">

    <div role="tablist" class="tabs tabs-boxed mb-8">
        @foreach($tabs as $tab)
            <a role="tab" class="tab flex flex-row gap-2"
               x-bind:class="selectedTab === '{{$tab['key']}}' ? 'tab-active' : ''"
               x-on:click="selectedTab = '{{$tab['key']}}'">
                @svg('heroicon-o-'.$tab['icon'], 'w-4 h-4')
                {{$tab['label']}}
            </a>
        @endforeach
    </div>

    <!-- Settings tab -->
    <div x-show="selectedTab === 'settings'">
        <form id="project-form" action="{{route('projects.update', $project)}}"
              method="POST"
              x-ref="form"
              class="flex flex-col gap-2 border rounded-lg p-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-5 gap-2">
                <div class="col-span-2">
                    <label for="name-input" class="label flex flex-col items-start">
                        <span class="label-text">Name</span>
                        <span class="label-text-alt">This will appear as a page title</span>
                    </label>
                </div>
                <input type="text"
                       id="name-input"
                       name="name"
                       value="{{$project->name}}"
                       class="input input-bordered col-span-3"/>


                <label class="label col-span-2" for="slug-input">
                    <span class="label-text">Slug</span>
                </label>
                <input type="text"
                       id="slug-input"
                       name="slug"
                       value="{{$project->slug}}"
                       class="input input-bordered col-span-3"/>


                <label class="label cursor-pointer col-span-2" for="redirect_after_submission-input">
                    <span class="label-text">Redirect</span>
                </label>
                <div class="col-span-3">
                    <input type="hidden" name="redirect_after_submission" value="0"/>
                    <input type="checkbox"
                           id="redirect_after_submission-input"
                           name="redirect_after_submission"
                           {{$project->redirect_after_submission ? 'checked="checked"' : ''}} value="1"
                           class="checkbox"/>
                </div>

                <label class="label col-span-2" for="redirect_to_after_submission-input">
                    <span class="label-text">Redirect URL</span>
                </label>
                <input type="text"
                       id="redirect_to_after_submission-input"
                       name="redirect_to_after_submission"
                       value="{{$project->redirect_to_after_submission}}"
                       class="input input-bordered col-span-3"/>
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
    <div class="flex flex-col gap-4 border rounded-lg px-4 pb-4" x-show="selectedTab === 'editor'">
        <form id="project-version-form">
            <input type="hidden"
                   name="color_theme"
                   value="{{$version->color_theme}}"
                   x-model="colorTheme"/>
            <input type="hidden"
                   name="block_editor_data"
                   value="{{$version->block_editor_data}}"/>
            <input type="hidden"
                   name="success_editor_data"
                   value="{{$version->success_editor_data}}"/>
        </form>

        <div class="grid grid-cols-5 gap-2">
            <div class="label col-span-2">
                <span class="label-text">Theme</span>
            </div>
            <div class="col-span-3">
                <div class="flex flex-row bg-base-100 justify-between w-full btn"
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
        </div>

        <div class="form-control">
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

        <div role="tablist" class="tabs tabs-bordered">
            @foreach($editorModes as $editorMode)
                <a role="tab" class="tab"
                   x-on:click="editorMode = '{{$editorMode}}'"
                   x-bind:class="editorMode === '{{$editorMode}}' ? 'tab-active' : ''">{{$editorMode}}</a>
            @endforeach
        </div>

        <div x-show="editorMode === 'form'">
            <div id="editorjs"
                 data-theme="lofi"
                 class="prose border-dashed border-2"
                 data-data="{{$version->block_editor_data}}">
            </div>
        </div>

        <div x-show="editorMode === 'success'">
            <div id="success-editorjs"
                 data-theme="lofi"
                 class="prose border-dashed border-2"
                 data-data="{{$version->success_editor_data}}">
            </div>
        </div>
    </div>
</div>

<x-slot:scripts>
    @vite('resources/js/block-editor.js')
    <script>
        const projectForm = document.querySelector('#project-form');
        const form = document.querySelector('#project-version-form');
        const previewIframe = document.querySelector('#project-preview')
        const successPreviewIframe = document.querySelector('#success-preview')

        function confirmDelete($event) {
            const name = projectForm.querySelector('[name="name"]').value;

            if (!confirm(`Are you sure you want to delete "${name}"?`)) {
                $event.preventDefault();
            }
        }

        function saveProjectVersion() {
            window.axios.post(`/projects/{{$project->id}}/versions/{{$version->id}}`, {
                _method: 'PUT',
                color_theme: form.querySelector('[name="color_theme"]').value,
                block_editor_data: form.querySelector('[name="block_editor_data"]').value,
                success_editor_data: form.querySelector('[name="success_editor_data"]').value,
            }).then(() => {
                refreshIframe(previewIframe);
                refreshIframe(successPreviewIframe);
            });

        }

        function refreshIframe(iframeEl) {
            const url = new URL(iframeEl.src);
            url.searchParams.set('preview', Date.now());

            iframeEl.src = url.toString();
        }

        document.addEventListener('block-editor-change', (event) => {
            const data = event.detail.data;
            form.querySelector('input[name="block_editor_data"]').value = JSON.stringify(data);

            saveProjectVersion();
        });

        document.addEventListener('success-editor-change', (event) => {
            const data = event.detail.data;
            form.querySelector('input[name="success_editor_data"]').value = JSON.stringify(data);

            saveProjectVersion();
        });
    </script>
</x-slot:scripts>
