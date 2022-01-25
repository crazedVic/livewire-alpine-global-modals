<div class="mx-auto max-w-2xl">
    <div class="flex justify-between items-end mb-5 w-full">
        <div class="flex justify-around items-baseline space-x-1 mr-8 text-blue-300">
            <span class="text-2xl">Tag</span>
            <span class="text-xs text-blue-400">New</span>
        </div>
        <div>
             <a class="border-b border-blue-400 text-xs cursor-pointer select-none" wire:click="save()">Save</a>&nbsp;&nbsp;
            <a class="text-gray-400 text-xs cursor-pointer select-none" @click="open=false">Cancel</a>
        </div>
    </div>
    <form class="px-2 md:mx-2 ">
        <div class="flex flex-col lg:flex-row justify-between items-center md:items-end my-1 md:space-x-3">
            <x-alpine-input model="tag" property="name" label="Name" class="flex-grow"/>
            <x-alpine-select model="tag" property="category" label="Category" :force="true" class="lg:w-auto min-w-fit">
                <option value="" selected>Select Category</option>
                <option value="employee">Employees</option>
                <option value="consultant">Consultants</option>
                <option value="document">Documents</option>
                <option value="user">Users</option>
            </x-alpine-select>
        </div>
    </form>
</div>
