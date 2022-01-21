<span>
    <div class="flex justify-between items-end my-5 mx-8">
        <div class="flex justify-around items-baseline space-x-3 mr-8 text-blue-300">
            <a class="text-2xl" href="/">Consultants</a>
            <a class="text-xs" href="/tags">Tags</a>
        </div>
        <div>
            <a class="border-b border-blue-400 text-xs" href="/consultants/add">New</a>
        </div>
    </div>
    <div class="px-12">
        <input wire:model="searchTerm" type="text" class="bg-gray-600 text-white w-full py-1 px-4 rounded-md focus:outline-none focus:bg-gray-500" placeholder="Search by Tag" >
        @if($searchTerm!="")<div class="italic text-xs text-gray-600 text-right mt-1">Searching for "{{$searchTerm}}"</div>@endif
    </div>
    <div class="px-12 py-8">
        @foreach($consultants as $consultant)
            <div class="bg-gray-700 pl-3 bg-opacity-20 mb-0.25 flex items-center rounded-sm"><span class="mr-2 whitespace-nowrap">{{$consultant->name}}</span>
                <span class="flex items-center flex-wrap justify-end w-full">
                    @if($searchTerm!="")
                        @foreach($consultant->tags()->where('name', 'like', '%'.$searchTerm.'%')->get() as $tag)
                            <div class="align-middle bg-green-800 color-white rounded-md px-1 select-none py-0.5 text-xxs mx-0.25 my-0.25">{{$tag->name}}</div>
                        @endforeach
                    @endif
                </span>
            </div>
        @endforeach
    </div>
</span>
