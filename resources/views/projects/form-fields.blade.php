<div class="grid grid-cols-5 gap-2">
    <div class="col-span-2">
        <label for="name-input" class="label flex flex-col items-start">
            <span class="label-text">Name</span>
            <span class="label-text-alt">This will appear as a page title</span>
        </label>
    </div>
    <div class="col-span-3 flex flex-col items-start">
        <input type="text"
               id="name-input"
               name="name"
               x-model="projectName"
               value="{{$project->name}}"
               class="input input-bordered w-full @error('name') input-error @enderror"/>
        @error('name')
        <span class="text-sm text-error">{{$message}}</span>
        @enderror
    </div>

    <div class="col-span-2">
        <label for="description-input" class="label flex flex-col items-start">
            <span class="label-text">Description</span>
        </label>
    </div>
    <div class="col-span-3 flex flex-col items-start">
        <textarea
               id="description-input"
               name="description"
               x-autosize
               rows="4"
               class="input input-bordered w-full @error('description') input-error @enderror">{{old('description') ?? $project->description}}</textarea>
        @error('description')
        <span class="text-sm text-error">{{$message}}</span>
        @enderror
    </div>

    <label class="label col-span-2" for="slug-input">
        <span class="label-text">Slug</span>
    </label>
    <div class="col-span-3">
        <input type="text"
               id="slug-input"
               name="slug"
               x-model="projectSlug"
               value="{{$project->slug}}"
               class="input input-bordered w-full @error('slug') input-error @enderror"/>
        @error('slug')
        <span class="text-sm text-error">{{$message}}</span>
        @enderror
    </div>

    <label class="label col-span-2 flex flex-col items-start" for="ogimage-input">
        <span class="label-text">OG image URL</span>
        <span class="label-text-alt">Open Graph image that will be used for social preview, e.g. Twitter card, LinkedIn post etc.</span>
    </label>
    <div class="col-span-3">
        <input type="text"
               id="ogimage-input"
               name="ogimage_url"
               value="{{old('ogimage_url') ?? $project->ogimage_url}}"
               class="input input-bordered w-full @error('ogimage_url') input-error @enderror"/>
        @error('ogimage_url')
        <span class="text-sm text-error">{{$message}}</span>
        @enderror
    </div>

    <h3 class="col-span-5 font-semibold text-lg pt-4">Redirection</h3>

    <label class="label cursor-pointer col-span-2" for="redirect_after_submission-input">
        <div class="flex flex-col">
            <span class="label-text">Redirect</span>
            <span class="label-text-alt">Redirect users to "Redirect URL" after submission instead of showing success page</span>
        </div>
    </label>
    <div class="col-span-3">
        <input type="hidden" name="redirect_after_submission" value="0"/>
        <input type="checkbox"
               id="redirect_after_submission-input"
               name="redirect_after_submission"
               {{( old('redirect_after_submission') ?? $project->redirect_after_submission) ? 'checked="checked"' : ''}} value="1"
               class="checkbox"/>
    </div>

    <label class="label col-span-2" for="redirect_to_after_submission-input">
        <span class="label-text">Redirect URL</span>
    </label>
    <div class="col-span-3">
        <input type="text"
               id="redirect_to_after_submission-input"
               name="redirect_to_after_submission"
               placeholder="https://example.com"
               value="{{old('redirect_to_after_submission') ?? $project->redirect_to_after_submission}}"
               class="input input-bordered w-full"/>
        @error('redirect_to_after_submission')
        <span class="text-sm text-error">{{$message}}</span>
        @enderror
    </div>

    <h3 class="col-span-5 font-semibold text-lg pt-4">Domain</h3>

    <label class="label col-span-2 flex-col items-start" for="custom_domain-input">
        <span class="label-text">Custom domain</span>
        <!-- TODO: Add a note about setting up custom domain -->
    </label>
    <div class="col-span-3">
        <input type="text"
               id="custom_domain-input"
               name="custom_domain"
               placeholder="example.com"
               @if(!Auth::user()->isPremium()) disabled @endif
               value="{{old('custom_domain') ?? $project->custom_domain}}"
               class="input input-bordered w-full @error('custom_domain') input-error @enderror"/>
        @error('custom_domain')
        <span class="text-sm text-error">{{$message}}</span>
        @enderror
    </div>

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
