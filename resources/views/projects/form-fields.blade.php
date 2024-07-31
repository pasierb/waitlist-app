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
           x-model="projectName"
           value="{{$project->name}}"
           class="input input-bordered col-span-3"/>


    <label class="label col-span-2" for="slug-input">
        <span class="label-text">Slug</span>
    </label>
    <input type="text"
           id="slug-input"
           name="slug"
           x-model="projectSlug"
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
            class="btn btn-secondary">
        Save
    </button>
</div>
