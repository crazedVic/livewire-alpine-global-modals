<div x-data="{open: true}" x-init="$watch('open', value => { if (!value) window.location.href='{{$originURL}}' })">
    @livewire($component)
</div>
