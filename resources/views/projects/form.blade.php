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

<form id="project-form" action="{{$project->id ? route('projects.update', $project) : route('projects.create')}}"
      method="POST"
      x-data="{colorTheme: '{{$project->color_theme}}'}"
      x-ref="form">
    @csrf
    @if($project->id)
        @method('PUT')
    @else
        @method('POST')
    @endif

    <div class="flex flex-col gap-4">
        <div class="form-control">
            <div class="label">
                <span class="label-text">Name</span>
            </div>
            <input type="text"
                   name="name"
                   value="{{$project->name}}"
                   class="input input-bordered"/>
        </div>

        <div class="form-control">
            <div class="label">
                <span class="label-text">Theme</span>
            </div>
            <select class="select select-bordered"
                    name="color_theme"
                    x-on:change="saveProject()"
                    x-model="colorTheme">
                @foreach($themes as $theme)
                    <option value="{{$theme}}">
                        {{$theme}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="columns-2">
            <section>
                <div class="px-8">
                    <div id="editorjs"
                         data-theme="lofi"
                         class="border prose"
                         data-data="{{$project->block_editor_data}}">
                    </div>
                    <input type="hidden"
                           name="block_editor_data"
                           value="{{$project->block_editor_data}}"
                           x-ref="blockEditorDataInput"/>
                </div>
            </section>

            <section>
                <div class="mockup-browser border-base-300 border">
                    <div class="mockup-browser-toolbar">
                        <div class="input border-base-300 border">
                            {{route('project.page', $project->slug)}}
                        </div>
                    </div>
                    <div class="border-base-300 flex justify-center border-t">

                        <iframe src="{{route('projects.show', $project)}}"
                                id="project-preview"
                                class="w-full h-96"
                                title="Preview"></iframe>
                    </div>
                </div>
            </section>
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
    </div>
</form>

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
            name: form.querySelector('input[name="name"]').value,
            color_theme: form.querySelector('select[name="color_theme"]').value,
            block_editor_data: form.querySelector('input[name="block_editor_data"]').value,
        }).then(() => {
            previewIframe.src = `/projects/{{$project->id}}?preview=${Date.now()}`;
        });

    }

    document.addEventListener('block-editor-change', (event) => {
        const data = event.detail.data;
        form.querySelector('input[name="block_editor_data"]').value = JSON.stringify(data);

        saveProject();
    });
</script>
