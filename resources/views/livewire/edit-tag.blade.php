<div class="mx-auto max-w-2xl">
    <div class="flex justify-between items-end mb-5">
        <div class="flex justify-around items-baseline space-x-1 mr-8 text-blue-300">
            <span class="text-2xl">Tag</span>
            <span class="text-xs text-blue-400">New</span>
        </div>
        <div>
             <a class="border-b border-blue-400 text-xs cursor-pointer select-none" wire:click="save()">Save</a>&nbsp;&nbsp;
            <a class="text-gray-400 text-xs cursor-pointer select-none" @click="open=false">Cancel</a>
        </div>
    </div>
    <form class="px-2 md:mx-2">
        <div class="flex flex-col md:flex-row w-full justify-between my-1 md:space-x-3 ">
            <label for="name" class="block my-1 flex-grow">
                <input wire:model="name" id="name" type="text" autocomplete="nope"
                       class="bg-gray-600 text-white w-full py-1 px-4 rounded-md focus:outline-none
                       focus:bg-gray-500 focus:border focus:border-blue-600
                @error('name') border border-red-500 @enderror" placeholder="Tag Name" >
                @error('name') <div class="text-red-400 text-right italic text-xxs my-0">{{ $message }}</div> @enderror
            </label>
            <label for="category" class="block my-1 md:flex-shrink md:flex-grow-0 flex-grow ">
                <select wire:model="category" type="text" id="category"
                        class="bg-gray-600 text-white py-1 px-4 w-full md:w-auto focus:outline-none focus:bg-gray-500 appearance-none rounded-md
                @error('category') border border-red-500 @enderror">
                    <option value="" selected>Select Category</option>
                    <option>Employees</option>
                    <option>Consultants</option>
                    <option>Documents</option>
                    <option>Deals</option>
                </select>
                @error('category') <div class="text-red-400 text-right italic text-xxs my-0">{{ $message }}</div> @enderror
            </label>
        </div>

    </form>
</div>
