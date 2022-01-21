
<div x-data="{open: true}" x-init="$watch('open', value => { if (!value) window.location.href='{{$originURL}}' })" class="my-5 mx-2 md:mx-4 lg:mx-8 ">
    @livewire($component)

</div>
