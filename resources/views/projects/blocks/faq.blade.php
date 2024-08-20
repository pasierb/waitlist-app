<div class="w-full">
    <div class="max-w-7xl px-6 py-8 sm:py-32 lg:px-8 lg:py-20 mx-auto">
        <div class="w-full max-w-4xl divide-y divide-base-content/30 mx-auto">
            @foreach($data->items as $item)
                <dl class="mt-10 space-y-6 divide-y divide-base-content/70"
                    x-data="{open: false}">
                    <div class="pt-6">
                        <dt>
                            <!-- Expand/collapse question button -->
                            <button type="button"
                                    class="flex w-full items-start justify-between text-left text-base-content"
                                    x-on:click="open = !open"
                                    aria-controls="faq-0" aria-expanded="false">
                                <span class="text-base font-semibold leading-7">
                                    {{$item->question}}
                                </span>
                                <span class="ml-6 flex h-7 items-center">
                                    <!--
                                      Icon when question is collapsed.

                                      Item expanded: "hidden", Item collapsed: ""
                                    -->
                                    <svg class="h-6 w-6" x-show="!open"
                                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"/>
                                    </svg>
                                    <!--
                                      Icon when question is expanded.

                                      Item expanded: "", Item collapsed: "hidden"
                                    -->
                                    <svg class="h-6 w-6" x-show="open"
                                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6"/>
                                    </svg>
                                  </span>
                            </button>
                        </dt>

                        <dd class="mt-2 pr-12" x-show="open">
                            <p class="text-base leading-7 text-base-content/90">
                                {{$item->answer}}
                            </p>
                        </dd>
                    </div>

                    <!-- More questions... -->
                </dl>
            @endforeach
        </div>
    </div>
</div>
