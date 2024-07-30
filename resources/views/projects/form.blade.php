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

<div x-data="{colorTheme: '{{$project->color_theme}}', selectedTab: 'settings'}"
     x-init="$watch('colorTheme', saveProject)"
     class="h-full">

    <div role="tablist" class="tabs tabs-boxed mb-8">
        <a role="tab" class="tab"
           x-bind:class="selectedTab === 'settings' ? 'tab-active' : ''"
           x-on:click="selectedTab = 'settings'">Settings</a>
        <a role="tab" class="tab"
           x-bind:class="selectedTab === 'editor' ? 'tab-active' : ''"
           x-on:click="selectedTab = 'editor'">Content editor</a>
    </div>

    <div x-show="selectedTab === 'settings'">
        <form id="project-form" action="{{route('projects.update', $project)}}"
              method="POST"
              x-ref="form"
              class="flex flex-col gap-4">
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

                <input type="hidden" name="color_theme" x-model="colorTheme"
                       x-on:change="saveProject()">
            </div>

            <div>
                <button type="submit"
                        class="btn btn-primary"
                        x-on:click.prevent="handleSubmit($refs, $dispatch)">
                    Save
                </button>

                <a href="{{route('projects.index')}}"
                   class="btn btn-secondary">
                    Cancel
                </a>
            </div>

            <input type="hidden"
                   name="block_editor_data"
                   value="{{$project->block_editor_data}}"
                   x-ref="blockEditorDataInput"/>
        </form>
    </div>

    <div class="px-8" x-show="selectedTab === 'editor'">
        <div id="editorjs"
             data-theme="lofi"
             class="prose border-dashed border"
             data-data="{{$project->block_editor_data}}">
        </div>
    </div>
</div>

<x-slot:scripts>
    @vite('resources/js/block-editor.js')
    <script>
        const form = document.querySelector('#project-form');
        const previewIframe = document.querySelector('#project-preview')

        function handleSubmit($refs, $dispatch) {
            $dispatch('block-editor-save', {
                callback: (data) => {
                    $refs.blockEditorDataInput.value = JSON.stringify(data);
                    $refs.form.submit();
                }
            });
        }

        function saveProject() {
            window.axios.post(`/projects/{{$project->id}}`, {
                _method: 'PUT',
                name: form.querySelector('[name="name"]').value,
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

            saveProject();
        });
    </script>
</x-slot:scripts>
