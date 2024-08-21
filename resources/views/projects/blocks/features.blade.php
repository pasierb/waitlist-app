<dl class="col-span-2 grid grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 my-8 max-w-4xl mx-auto">
    @foreach($data->items as $item)
        <div class="relative pl-9">
            <dt class="font-semibold text-base-content">
                <svg class="absolute left-0 top-1 h-5 w-5 text-secondary" viewBox="0 0 20 20" fill="currentColor"
                     aria-hidden="true">
                    @isset($item->icon)
                            <?php try{ ?>
                        @svg('heroicon-o-'. $item->icon)
                        <?php }catch (\Exception $e){ ?>
                        @svg('heroicon-o-check')
                        <?php } ?>
                    @else
                        @svg('heroicon-o-check', 'text-secondary')
                    @endif
                </svg>
                {{$item->headline}}
            </dt>
            <dd class="mt-2">
                {!! Illuminate\Mail\Markdown::parse($item->description) !!}
            </dd>
        </div>
    @endforeach
</dl>
