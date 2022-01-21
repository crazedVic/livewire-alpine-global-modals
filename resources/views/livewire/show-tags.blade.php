<span>
    <div class="flex justify-between items-end my-5 mx-8">
        <div class="flex justify-around items-baseline space-x-3 mr-8 text-blue-300">
            <a class="text-2xl" href="/tags">Tags</a>
            <a class="text-xs" href="/">Consultants</a>
        </div>
        <div>
            <a class="border-b border-blue-400 text-xs" href="/tags/add/edit-tag?originURL=/tags">New</a>
        </div>
    </div>
    <div class="px-12">
        <input wire:model="searchTerm" type="text" class="bg-gray-600 text-white w-full py-1 px-4 rounded-md focus:outline-none focus:bg-gray-500" placeholder="Search Tags" >
        @if($searchTerm!="")<div class="italic text-xs text-gray-600 text-right mt-1">Searching for "{{$searchTerm}}"</div>@endif
    </div>
    <div class="px-12 py-8">
        @foreach($tags as $tag)
            <div class="bg-gray-700 pl-3 bg-opacity-20 mb-0.25 flex items-center rounded-sm">
                <span class="mr-2 whitespace-nowrap">{{$tag->name}}</span>
            </div>
        @endforeach
    </div>
     <button class="px-4 py-2 text-white bg-blue-500 rounded select-none no-outline focus:shadow-outline"
             wire:click="$emitTo('modal', 'show', 'edit-tag')">Open Modal</button>
</span>
