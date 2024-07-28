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

<form action="{{$project->id ? route('projects.update', $project) : route('projects.create')}}"
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
                    x-model="colorTheme">
                @foreach($themes as $theme)
                    <option value="{{$theme}}">
                        {{$theme}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="px-8">
            <div id="editorjs"
                 x-bind:data-theme="colorTheme"
                 class="border prose"
                 data-data="{{$project->block_editor_data}}">
            </div>
            <input type="hidden"
                   name="block_editor_data"
                   value="{{$project->block_editor_data}}"
                   x-ref="blockEditorDataInput"/>
        </div>

        <div>
            <iframe src="{{route('projects.show', $project)}}"
                    class="w-full h-96"
                    title="Preview"></iframe>
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
    function handleSubmit($refs, $dispatch) {
        $dispatch('block-editor-save', {
            callback: (data) => {
                $refs.blockEditorDataInput.value = JSON.stringify(data);
                $refs.form.submit();
            }
        });
    }
</script>
