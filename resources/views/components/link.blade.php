<a {{ $attributes }}>
    <div class="mb-6 relative max-lg:row-start-1">
        <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-t-[2rem]"></div>
        <div class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-t-[calc(2rem+1px)]">
            <div class="hover:text-gray-100 hover:bg-gray-700 px-8 pt-8 sm:px-10 sm:pt-10">
                <p class="mb-8 text-lg font-medium tracking-tight max-lg:text-center">{{ $slot }}</p>
            </div>
        </div>
        <div class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 max-lg:rounded-t-[2rem]"></div>
    </div>
</a>