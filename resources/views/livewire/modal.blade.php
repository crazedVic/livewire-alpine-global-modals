<div class="mt-6" x-data="{ open: @entangle('show')}">
    <!-- Dark Overlay -->
    <div class="fixed inset-0" style="background-color: rgba(0,0,0,.5);" x-show="open"></div>
    <!-- A basic modal dialog with title, body and one button to close -->
    <div class="fixed inset-0 flex items-center justify-center w-full h-full" x-show="open"
         x-transition:enter="motion-safe:ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-0"
         x-transition:enter-end="opacity-100 scale-100">
        <div class="h-auto p-4 mx-2 text-left bg-black rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="open = false">
            @if($component)
                @livewire($component)
            @endif
        </div>
    </div>
</div>
