@props(['title', 'footer'])

<dialog id="ai_modal" class="modal">
    <div class="modal-box w-8/12 max-w-4xl flex flex-col max-h-full my-12">
        <div class="mb-4">
            <form method="dialog">
                <button class="btn btn-circle btn-ghost absolute right-2 top-2">
                    <x-heroicon-o-x-mark class="w-6 h-6"/>
                </button>
            </form>

            <h3 class="text-lg font-bold">
                @isset($title)
                    {{$title}}
                @endisset
            </h3>
        </div>
        <div class="flex-grow overflow-scroll">
            {{$slot}}
        </div>
        <div class="modal-action mt-2">
            @isset($footer)
                {{$footer}}
            @endisset
        </div>
    </div>
</dialog>
