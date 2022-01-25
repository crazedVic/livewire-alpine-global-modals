<div class="mx-auto max-w-2xl p-1 md:p-2">
    <div class="flex justify-between items-end mt-2 mb-5">
        <div class="flex justify-around items-baseline space-x-3 mr-8 text-blue-300">
            <a class="text-2xl" href="/tags">Tags</a>
            <a class="text-xs" href="/">Consultants</a>
        </div>
        <div class="flex flex-row space-x-0.5 md:space-x-2 cursor-pointer">
            @if(!$showTrashed)<span class="border-b border-blue-400 text-xs select-none" wire:click="toggleTrashed()">Archived</span>@endif
            <a class="lg:hidden border-b border-blue-400 text-xs select-none" href="/tags/add/edit-tag?originURL=/tags">New</a>
            <a class="hidden lg:block border-b border-blue-400 text-xs select-none" wire:click="$emitTo('modal', 'show', 'edit-tag')">New</a>
        </div>
    </div>
    <div class="px-4">
        <input wire:model="searchTerm" type="text"
               class="bg-gray-600 text-white w-full py-1 px-4 rounded-md focus:outline-none focus:bg-gray-500"
               placeholder="Search Tags" >
        <div class="flex flex-col md:flex-row justify-between italic text-xs text-gray-600 text-right mt-1">
            @if($showTrashed)<span>Showing Archived Tags <span class="underline cursor-pointer select-none text-blue-600" wire:click="toggleTrashed()">hide</span></span>@endif
            @if($searchTerm!="")<span>Searching for "{{$searchTerm}}" <span class="underline cursor-pointer select-none text-blue-600" wire:click="$set('searchTerm','')">clear</span></span>@endif
        </div>
    </div>
    <div class="px-4 py-4" x-data>
        @foreach($tags as $tag)
            <div class=" pl-3 mb-0.25 flex items-center rounded-sm hover:bg-gray-800
                    @if($tag->id == $new_id)
                        bg-green-700 bg-opacity-70 animate-fade
                    @else bg-gray-700 bg-opacity-20
                    @endif" id="{{$loop->index}}"
                 @if(!$tag->trashed())
                    x-on:mouseover="$refs.edit_{{$loop->index}}.style.visibility='visible';"
                    x-on:mouseout="$refs.edit_{{$loop->index}}.style.visibility='hidden';"
                @endif
                >
                <span class="mr-2 whitespace-nowrap">{{$tag->name}}
                    @if(!$tag->trashed())
                        <span x-ref="edit_{{$loop->index}}" class="invisible cursor-pointer">
                            <!-- this link is for desktop only-->
                            <i class="hidden lg:inline-block far fa-edit text-green-500 text-xs"
                               wire:click="$emitTo('modal', 'show','edit-tag', '{{$tag->id}}')"></i>
                            <!-- this link is for mobile only-->
                            <a href="/tags/{{$tag->id}}/edit-tag?originURL=/tags">
                                <i class="inline-block lg:hidden far fa-edit text-green-500 text-xs" ></i></a>
                        </span>
                    @else
                        <span class="md:align-middle bg-red-800 color-white rounded-md px-1
                            select-none py-0.5 text-xxs mx-0.25 my-0.25">Archived</span>
                    @endif
                </span>
            </div>
        @endforeach
    </div>
</div>
