<div class="mx-auto max-w-2xl p-1 md:p-2">
    <div class="flex justify-between items-end mt-2 mb-5">
        <div class="flex justify-around items-baseline space-x-3 mr-8 text-blue-300">
            <a class="text-2xl" href="/tags">Tags</a>
            <a class="text-xs" href="/">Consultants</a>
        </div>
        <div class=" space-x-0.5 md:space-x-2">
            <a class="md:hidden border-b border-blue-400 text-xs select-none" href="/tags/add/edit-tag?originURL=/tags">New</a>
            <a class="hidden md:block border-b border-blue-400 text-xs select-none" wire:click="$emitTo('modal', 'show', 'edit-tag')">New</a>
        </div>
    </div>
    <div class="px-4">
        <input wire:model="searchTerm" type="text"
               class="bg-gray-600 text-white w-full py-1 px-4 rounded-md focus:outline-none focus:bg-gray-500"
               placeholder="Search Tags" >
        @if($searchTerm!="")<div class="italic text-xs text-gray-600 text-right mt-1">Searching for "{{$searchTerm}}"</div>@endif
    </div>
    <div class="px-4 py-4" x-data>
        @foreach($tags as $tag)
            <div class=" pl-3 mb-0.25 flex items-center rounded-sm hover:bg-gray-800
                    @if($tag->id == $new_id)
                        bg-green-700 bg-opacity-70 animate-fade
                    @else bg-gray-700 bg-opacity-20
                    @endif" id="{{$loop->index}}"
                    x-on:mouseover="$refs.edit_{{$loop->index}}.style.visibility='visible';"
                    x-on:mouseout="$refs.edit_{{$loop->index}}.style.visibility='hidden';">
                <span class="mr-2 whitespace-nowrap">{{$tag->name}}
                <span x-ref="edit_{{$loop->index}}" class="invisible cursor-pointer">
                        <!-- this link is for desktop only-->
                        <i class="hidden md:inline-block far fa-edit text-red-500"
                           wire:click="$emitTo('modal', 'show','edit-tag', '{{$tag->id}}')"></i>
                    <!-- this link is for mobile only-->
                        <a href="/tags/{{$tag->id}}/edit-tag?originURL=/tags">
                            <i class="inline-block md:hidden far fa-edit text-green-500" ></i></a>
                    </span></span>
            </div>
        @endforeach
    </div>
</div>
