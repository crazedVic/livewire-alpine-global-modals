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
        <div class="flex flex-col md:flex-row w-full justify-between md:items-end my-1 md:space-x-3 ">
            <x-alpine-input model="tag" property="name" label="Tag Name" />
            <label for="tag.category" class="block min-w-fit my-1.5 md:flex-shrink md:flex-grow-0 flex-grow" x-data="{show:false,tag_category:''}">
                <div class="text-xs ml-1 mb-0.25 text-gray-400" x-show="show" x-cloak x-transition.duration.1000ms>Category</div>
                <div class="relative">
                    <select class="block appearance-none w-full bg-gray-600 rounded-md text-gray-300
                        py-1.5 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-gray-600 focus:rounded-md
                        @error('tag.category') outline outline-1 outline-red-500 outline-offset-4 @enderror
                        focus:rounded-none" wire:model="tag.category" type="text" id="tag.category" x-model="tag_category"
                            x-on:focus="show=true" x-on:blur="show=false">

                        <option value="" selected>Select Category</option>
                        <option value="employee">Employees</option>
                        <option value="consultant">Consultants</option>
                        <option value="document">Documents</option>
                        <option value="user">Users</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 bg-gray-600 text-gray-600 rounded-lg">
                        <svg class="fill-current h-3 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
                @error('tag.category') <div class="text-red-400 text-right italic text-xxs mt-1">{{ $message }}</div> @enderror
            </label>
        </div>
    </form>
</div>
