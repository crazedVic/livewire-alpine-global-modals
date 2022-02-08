@props([
    'model', 'property', 'label', 'hidden' => false, 'force'=> false
])

<label for="{{$property}}"
       {{ $attributes->merge(['class' => "block w-full mb-1 " . ($hidden ? "hidden" :"" )]) }}
       x-data="{show:false, {{$property}}:'{{addslashes($this->getPropertyValue($model)->$property)}}'}">
    <div class="text-xs ml-1 mb-0.5 text-gray-400"
         @if(!$force) x-show="show | {{$property}}.length > 0"  @endif x-cloak x-transition.duration.1000ms>{{$label}}</div>
    <div class="relative">
        <select class="block appearance-none w-full bg-gray-600 rounded-md text-gray-300
                        py-1.5 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-gray-600 focus:rounded-md
                        @error($model .'.'. $property) outline outline-1 outline-red-500 outline-offset-4 @enderror
                        "
                wire:model="{{$model .'.'. $property}}"
                type="text"
                id="{{$property}}"
                x-model="{{$property}}"
                x-on:focus="show=true"
                x-on:blur="show=false">
           {{$slot}}
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 bg-gray-600 text-gray-600 rounded-lg">
            <svg class="fill-current h-3 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
            </svg>
        </div>
    </div>
    @error($model .'.'. $property) <div class="text-red-400 text-right italic text-xxs mt-1">{{ $message }}</div> @enderror
</label>
