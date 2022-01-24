<div class="mx-auto max-w-2xl p-1 md:p-2">
    <div class="flex justify-between items-end mt-2 mb-5">
        <div class="flex justify-around items-baseline space-x-3 mr-8 text-blue-300">
            <a class="text-2xl" href="/">Consultants</a>
            <a class="text-xs" href="/tags">Tags</a>
        </div>
        <div class=" space-x-0.5 md:space-x-2">
            <a class="lg:hidden border-b border-blue-400 text-xs select-none"
               href="/consultants/add/edit-consultant?originURL=/">New</a>
             <a class="hidden lg:block border-b border-blue-400 text-xs select-none"
                wire:click="$emitTo('modal', 'show', 'edit-consultant')">New</a>
        </div>
    </div>
    <div class="px-1 md:px-4">
        <input wire:model="searchTerm" type="text" class="bg-gray-600 text-white w-full py-1 px-4
           rounded-md focus:outline-none focus:bg-gray-500"
               placeholder="Search by Tag" >
        <div class="flex flex-row justify-end space-x-0.5 md:space-x-2 cursor-pointer">
            @if($searchTerm!="")
                <span class="italic text-xs text-gray-600 text-right mt-1">
                    Searching for "{{$searchTerm}}"
                    <span class="underline cursor-pointer select-none text-blue-600" wire:click="$set('searchTerm','')">clear</span>
                </span>
            @endif
        </div>
    </div>
    <div class="px-1 md:px-4 py-4" x-data>
        @foreach($consultants as $consultant)
            <div class="pl-3 mb-0.25 flex flex-col md:flex-row md:items-center rounded-sm hover:bg-gray-800
                        @if($consultant->id == $new_id)
                            bg-green-700 bg-opacity-70 animate-fade
                        @else bg-gray-700 bg-opacity-20
                    @endif"
                 id="{{$loop->index}}"
                 x-on:mouseover="$refs.edit_{{$loop->index}}.style.visibility='visible';"
                 x-on:mouseout="$refs.edit_{{$loop->index}}.style.visibility='hidden';">
                <span class="mr-2 whitespace-nowrap">
                    {{$consultant->name}}
                    <span x-ref="edit_{{$loop->index}}" class="invisible cursor-pointer">
                        <!-- this link is for desktop only-->
                        <i class="hidden lg:inline-block far fa-edit text-green-500 text-xs"
                           wire:click="$emitTo('modal', 'show','edit-consultant', '{{$consultant->id}}')"></i>
                        <!-- this link is for mobile only-->
                        <a href="/consultants/{{$consultant->id}}/edit-consultant?originURL=/">
                            <i class="inline-block lg:hidden far fa-edit text-green-500 text-xs" ></i></a>
                    </span>
                </span>
                <span class="flex md:items-center items-start flex-wrap md:justify-end w-full">
                    @if($searchTerm!="")
                        @foreach($consultant->tags()->where('name', 'like', '%'.$searchTerm.'%')->get() as $tag)
                            <div class="md:align-middle bg-green-800 color-white rounded-md px-1
                            select-none py-0.5 text-xxs mx-0.25 my-0.25">
                                {{$tag->name}}
                            </div>
                        @endforeach
                    @endif
                </span>
            </div>
        @endforeach
    </div>
</div>
