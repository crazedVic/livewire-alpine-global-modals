<div class="mt-6" x-data="{ open: @entangle('show')}">
    <!-- we could check to see if screen is too small and then redirect to fullpage wrapper? -->
    <!-- Dark Overlay -->
    <div class="fixed inset-0" style="background-color: rgba(255,255,255,.3);" x-show="open" x-cloak></div>
    <!-- A basic modal dialog with title, body and one button to close -->
    <div class="fixed inset-0 flex items-center justify-center" x-show="open" x-cloak
         x-transition:enter="motion-safe:ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-0"
         x-transition:enter-end="opacity-100 scale-100">
        <div class="p-3 mx-2 bg-black rounded shadow-xl md:max-w-xl md:p-3 lg:p-4 md:mx-0" @click.away="open = false">
            @if($component)
                @livewire($component, ['edit_id' => $edit_id])
            @endif
        </div>
    </div>
</div>
