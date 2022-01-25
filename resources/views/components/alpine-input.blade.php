@props([
    'model', 'property', 'label', 'hidden' => false, 'force'=> false
])

<label for="{{$property}}"
       {{ $attributes->merge(['class' => "block w-full mb-0.5 " . ($hidden ? "hidden" :"" )]) }}
       x-data="{show:false, {{$property}}:'{{$this->getPropertyValue($model)->$property}}'}">

    <div class="text-xs ml-1 text-gray-400"
         @if(!$force) x-show="show | {{$property}}.length > 0" @endif x-cloak x-transition.duration.1000ms >{{$label}}</div>

    <input type="text" id="{{$property}}" autocomplete="nope"  wire:model="{{$model .'.'. $property}}"
           class="bg-gray-600 text-white w-full py-1 px-4 my-0.5
                rounded-md focus:outline-none focus:bg-gray-500 focus:border focus:border-blue-600
                @error($model .'.'. $property) outline outline-1 outline-red-500 outline-offset-4 @enderror
                "
        placeholder="{{$label}}"
        x-on:focus="show=true" x-on:blur="show=false" x-model="{{$property}}"
    >
    @error($model .'.'. $property) <div class="text-red-400 text-right italic text-xxs my-0">{{ $message }}</div> @enderror
</label>
