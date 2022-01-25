@props([
    'model', 'property', 'label', 'type'=>'input', 'hidden' => false
])
<label for="{{$property}}"
       {{ $attributes->merge(['class' => "block my-1 w-full " . ($hidden ? "hidden" :"" )]) }}
       x-data="{show:false, {{$property}}:'{{$this->getPropertyValue($model)->$property}}'}">

    <div class="text-xs ml-1 mb-0.25 text-gray-400"
         x-show="show ||  {{$property}}.length > 0" x-cloak x-transition.duration.1000ms>{{$label}}</div>

    <{{$type}} type="text" id="{{$property}}" autocomplete="nope"  wire:model="{{$model .'.'. $property}}"
           class="bg-gray-600 text-white w-full py-1 px-4 my-0.5
                rounded-md focus:outline-none focus:bg-gray-500 focus:border focus:border-blue-600
                @error($model .'.'. $property) outline outline-1 outline-red-500 outline-offset-4 @enderror
                "
        placeholder="{{$label}}"
        x-on:focus="show=true" x-on:blur="show=false" x-model="{{$property}}"
    >
    @if($type=='select')
        {{ $slot }}
    @endif
    @error($model .'.'. $property) <div class="text-red-400 text-right italic text-xxs my-0">{{ $message }}</div> @enderror
</label>
