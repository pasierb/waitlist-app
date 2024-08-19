<?php

use App\Services\CopyWriters\CopyWriterPersona;

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
    [
        'key' => 'form',
        'label' => 'Form',
    ],
    [
        'key' => 'success',
        'label' => 'Success page',
    ],
];
?>
<x-app-layout>
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

        .cdx-simple-image__picture > * {
            margin: 0 auto;
        }
    </style>

    <div class="h-full flex flex-col"
         x-data="{colorTheme: '{{$version->color_theme}}', selectedTab: 'settings', editorMode: 'form', 'persona': 'max', 'personas': {{json_encode(CopyWriterPersona::availablePersonas())}}}"
         x-init="$watch('colorTheme', saveProjectVersion), $watch('editorMode', () => $dispatch('editor-mode-change', editorMode))">
        @include('projects.navbar')

        <div class="px-4 grow">
            <div class="grid grid-cols-1 lg:grid-cols-2 h-full gap-4">
                <section class="col-span-1 border-r pr-4 pt-4">
                    <div class="flex flex-col gap-4 rounded-lg px-4 pb-4">
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

                            @feature('ai-assistant')
                            <div class="col-span-2">
                                <details class="dropdown dropdown-hover">
                                    <summary class="btn m-1">
                                        <img x-bind:src="personas[persona].imageUrl" class="w-6 h-6 rounded-full"/>
                                        <span x-text="personas[persona].name"></span>
                                    </summary>
                                    <ul class="menu dropdown-content bg-base-100 rounded-box z-[100] w-52 p-2 shadow">
                                        @foreach(CopyWriterPersona::availablePersonas() as $key => $persona)
                                            <li>
                                                <button x-on:click="persona = '{{$key}}'">{{$persona->name}}</button>
                                            </li>
                                        @endforeach
                                    </ul>
                                </details>

                                @error('persona')
                                <span class="text-sm text-error">{{$message}}</span>
                                @enderror

                                @error('description')
                                <span class="text-sm text-error">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-span-3">
                                <button class="btn" onclick="ai_modal.showModal()">
                                    <x-heroicon-o-chat-bubble-bottom-center-text class="w-6 h-6"/>
                                </button>
                            </div>
                            @endfeature
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

                        <x-dialog title="AI Assistant">
                            <form
                                action="{{route('projects.versions.store', ['project' => $project, 'source_version_id' => $version->id])}}"
                                method="POST"
                                x-ref="aiAssistantForm">
                                @csrf
                                <input type="hidden" name="persona" x-model="persona"/>

                                <div class="grid grid-cols-5">
                                    <div class="col-span-2 sticky top-0">
                                        <label for="ai-description" class="label flex flex-col items-start">
                                            <span class="label-text">Description</span>
                                            <div class="label-text-alt flex flex-col gap-2">
                                                <p>For the best results, provide a detailed description:</p>

                                                <div class="pl-4 mt-4">
                                                    <ol class="list-decimal">
                                                        <li>What is the project about?</li>
                                                        <li>Compelling value proposition</li>
                                                        <li>What user will get</li>
                                                        <li>Why user should leave contact - FOMO (Fear of missing out)
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-span-3">
                                            <textarea name="description"
                                                      id="ai-description"
                                                      x-autosize
                                                      rows="3"
                                                      class="textarea textarea-bordered w-full max-h-96">{{old('description') ?? $version->lastPrompt()}}</textarea>
                                    </div>
                                </div>
                            </form>

                            <x-slot:footer>
                                <button class="btn btn-primary" x-on:click="$refs.aiAssistantForm.submit()">Save
                                </button>
                            </x-slot>
                        </x-dialog>

                        <div role="tablist" class="tabs tabs-bordered mt-6">
                            @foreach($editorModes as $editorMode)
                                <a role="tab" class="tab"
                                   x-on:click="editorMode = '{{$editorMode['key']}}'"
                                   x-bind:class="editorMode === '{{$editorMode['key']}}' ? 'tab-active' : ''">{{$editorMode['label']}}</a>
                            @endforeach
                        </div>

                        <div class="w-full">
                            <div x-show="editorMode === 'form'">
                                <div id="editorjs"
                                     data-theme="lofi"
                                     class="prose border-dashed border-2 mx-auto"
                                     data-data="{{$version->block_editor_data}}">
                                </div>
                            </div>

                            <div x-show="editorMode === 'success'">
                                <div id="success-editorjs"
                                     data-theme="lofi"
                                     class="prose border-dashed border-2 mx-auto"
                                     data-data="{{$version->success_editor_data}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="col-span-1 py-4"
                         x-data="{editorMode: 'form'}"
                         x-on:editor-mode-change.window="editorMode = $event.detail">
                    <div x-show="editorMode === 'form'"
                         class="mockup-browser border-base-300 border h-full">
                        <div class="mockup-browser-toolbar">
                            <div class="input border-base-300 border">
                                {{route('project.page', $project->slug)}}
                            </div>
                        </div>
                        <div class="border-base-300 flex justify-center border-t h-full min-h-96">

                            <iframe src="{{route('projects.versions.show', [$project, $version])}}"
                                    id="project-preview"
                                    class="w-full h-full"
                                    title="Preview"></iframe>
                        </div>
                    </div>

                    <div x-show="editorMode === 'success'"
                         class="mockup-browser border-base-300 border h-full">
                        <div class="mockup-browser-toolbar">
                            <div class="input border-base-300 border">
                                {{route('project.page', $project->slug)}}
                            </div>
                        </div>
                        <div class="border-base-300 flex justify-center border-t h-full min-h-96">

                            <iframe src="{{route('projects.versions.success_preview', [$project, $version])}}"
                                    id="success-preview"
                                    class="w-full h-full"
                                    title="Preview"></iframe>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    @push('scripts')
        @vite('resources/js/block-editor.js')
        <script>
            const form = document.querySelector('#project-version-form');
            const previewIframe = document.querySelector('#project-preview')
            const successPreviewIframe = document.querySelector('#success-preview')

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
    @endpush
</x-app-layout>
