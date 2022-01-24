<div class="mx-auto max-w-2xl">
    <div class="flex justify-between items-end mb-5">
        <div class="flex justify-around items-baseline space-x-1 mr-8 text-blue-300">
            <span class="text-2xl">Consultant</span>
            <span class="text-xs text-blue-400">@if($edit_id)Edit @else New @endif</span>
        </div>
        <div>
            <a class="border-b border-blue-400 text-xs cursor-pointer" wire:click="save()">Save</a>&nbsp;&nbsp;<a class="text-gray-400 text-xs cursor-pointer" href="/">Cancel</a>
        </div>
    </div>
    <form class="p-1 md:px-2 mx-2 lg:mx-4 border border-gray-800 pb-1 ">
        <h2 class="text-gray-300">Contact Information</h2>
        <label for="name" class="block my-1">
            <input wire:model="consultant.name" id="name" type="text" autocomplete="nope"  class="bg-gray-600 text-white w-full py-1 px-4 rounded-md focus:outline-none focus:bg-gray-500 focus:border focus:border-blue-600
            @error('consultant.name') border border-red-500 @enderror" placeholder="Consultant's Name" >
            @error('consultant.name') <div class="text-red-400 text-right italic text-xxs my-0">{{ $message }}</div> @enderror
        </label>
        <label for="company" class="block my-1">
            <input wire:model="consultant.company" type="text" id="company" autocomplete="nope" class="bg-gray-600 text-white w-full py-1 px-4 my-0.5 rounded-md focus:outline-none focus:bg-gray-500 focus:border focus:border-blue-600
            @error('consultant.company') border border-red-500 @enderror" placeholder="Company Name (optional)" >
            @error('consultant.company') <div class="text-red-400 text-right italic text-xxs my-0">{{ $message }}</div> @enderror
        </label>
        <label for="phone" class="block my-1">
            <input wire:model="consultant.phone" type="text" id="phone" autocomplete="nope"
                   class="bg-gray-600 text-white w-full py-1 px-4 my-0.5 rounded-md focus:outline-none focus:bg-gray-500 focus:border focus:border-blue-600
            @error('consultant.phone') border border-red-500 @enderror" placeholder="Phone Number" >
            @error('consultant.phone') <div class="text-red-400 text-right italic text-xxs my-0">{{ $message }}</div> @enderror
        </label>
        <label for="email" class="block my-1">
            <input wire:model="consultant.email" type="text" id="email" autocomplete="nope" class="bg-gray-600 text-white w-full py-1 px-4 my-0.5 rounded-md focus:outline-none focus:bg-gray-500 focus:border focus:border-blue-600
            @error('consultant.email') border border-red-500 @enderror" placeholder="Email Address" >
            @error('consultant.email') <div class="text-red-400 text-right italic text-xxs my-0">{{ $message }}</div> @enderror
        </label>
        <div class="flex flex-col md:flex-row w-full justify-between md:space-x-3 my-1">
            <label for="rate_currency" class="block flex-shrink w-full md:w-auto">
                <select wire:model="consultant.rate_currency" type="text" id="rate_currency"
                        class="bg-gray-600 text-white py-1 pl-4 md:pr-1 my-0.5 w-full focus:outline-none focus:bg-gray-500
                        appearance-none rounded-md
                @error('consultant.rate_currency') border border-red-500 @enderror">
                    <option selected>CAD$</option>
                    <option>USD$</option>
                    <option>Euro</option>
                </select>
                @error('consultant.rate_currency') <div class="text-red-400 text-right italic text-xxs my-1">{{ $message }}</div> @enderror
            </label>
            <label for="rate" class="block flex-grow w-full md:w-auto my-1 md:my-0">
                <input wire:model="consultant.rate" type="text" id="rate"
                       class="bg-gray-600 text-white py-1 px-4 my-0.5 w-full focus:outline-none focus:bg-gray-500 focus:border
                       focus:border-blue-600 rounded-md
                @error('consultant.rate') border border-red-500 @enderror" placeholder="Billing Rate" autocomplete="nope" >
                @error('consultant.rate') <div class="text-red-400 text-right italic text-xxs my-0">{{ $message }}</div> @enderror
            </label>
            <label for="rate_frequency" class="block flex-shrink w-full md:w-auto">
                <select wire:model="consultant.rate_frequency" type="text" id="rate_frequency"
                        class="bg-gray-600 text-white py-1 w-full pl-4 md:pr-1 my-0.5 focus:outline-none focus:bg-gray-500
                        appearance-none rounded-md
                @error('consultant.rate_frequency') border border-red-500 @enderror" placeholder="Hourly/Monthly">
                    <option value="" selected>Frequency</option>
                    <option>Per Hour</option>
                    <option>Per Day</option>
                    <option>Per Month</option>
                </select>
                @error('consultant.rate_frequency') <div class="text-red-400 text-right italic text-xxs my-0">{{ $message }}</div> @enderror
            </label>
        </div>
        <label for="platform" class="block w-my-1">
            <select wire:model="consultant.platform" type="text" id="platform" autocomplete="nope"
                    class="bg-gray-600 text-white py-1 px-4 my-0.5 w-full focus:outline-none focus:bg-gray-500
                        appearance-none rounded-md
                @error('consultant.platform') border border-red-500 @enderror">
                <option value="" selected>Select Platform</option>
                <option value="None">None/Direct</option>
                <option>Freelancer</option>
                <option>Fiverr</option>
                <option>Upwork</option>
            </select>
            @error('consultant.platform') <div class="text-red-400 text-right italic text-xxs my-1">{{ $message }}</div> @enderror
        </label>
        @if($consultant && ($consultant->platform != "None" && $consultant->platform != ""))
        <label for="platform_profile" class="block my-1">
            <input wire:model="consultant.platform_profile" type="text" id="platform_profile" autocomplete="nope"
                   class="bg-gray-600 text-white w-full py-1 px-4 my-0.5
                   rounded-md focus:outline-none focus:bg-gray-500 focus:border focus:border-blue-600
            @error('consultant.platform_profile') border border-red-500 @enderror" placeholder="Freelance Profile URL" >
            @error('consultant.platform_profile') <div class="text-red-400 text-right italic text-xxs my-0">{{ $message }}</div> @enderror
        </label>
        @endif
        <label for="linkedin" class="block my-1">
            <input wire:model="consultant.linkedin" type="text" id="linkedin" autocomplete="nope"
                   class="bg-gray-600 text-white w-full py-1 px-4 my-0.5 rounded-md focus:outline-none
                   focus:bg-gray-500 focus:border focus:border-blue-600
            @error('consultant.linkedin') border border-red-500 @enderror" placeholder="LinkedIn Profile URL" >
            @error('consultant.linkedin') <div class="text-red-400 text-right italic text-xxs my-0">{{ $message }}</div> @enderror
        </label>
    </form>
    <div class="mt-5 p-1 md:px-2 mx-2 lg:mx-4 border border-gray-800  pb-3 ">
        <div class="flex md:flex-row flex-col py-1 justify-between w-full flex-wrap">
             <h2 class="text-gray-300 flex-grow">Fields of Expertise</h2>
            <div class="flex-shrink">
                <input wire:model.debounce.500ms="searchTerm"
                       class="bg-gray-600 w-full md:w-auto text-white rounded-md text-xs px-2 py-0.5 focus:outline-none focus:bg-gray-500"
                       placeholder="Search" type="search">
            </div>
        </div>
        <span class="flex items-center flex-wrap w-full">
            @foreach($tags as $tag)
                <a class="align-middle color-white rounded-md px-1 py-0.5 text-xs mx-0.25 my-0.25 cursor-pointer select-none
                @if(in_array($tag->id, $selected_tags)) bg-green-700 @else bg-gray-700 @endif"
                wire:click="toggleTag({{$tag}})">{{$tag->name}}</a>
            @endforeach
        </span>
    </div>
    <div class="mt-5 p-1 md:px-2 mx-2 lg:mx-4  border border-gray-800">
        <div class="flex justify-between w-full">
            <h2 class="text-gray-300 flex-grow">Notes</h2>
        </div>
            <textarea
                class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    bg-gray-600 text-white  bg-clip-padding
                    border border-solid border-gray-700
                    rounded
                    transition
                    ease-in-out
                    m-0 focus:bg-gray-500
                    mb-3
                     focus:border-blue-600 focus:outline-none
                  "
        id="exampleFormControlTextarea1"
                wire:model="notes"
        rows="3"
        placeholder="Additional Notes"
            ></textarea>
    </div>
    @if($errors->any())
        <div class="mt-5 p-1 md:px-2 mx-2 lg:mx-4 text-xxs border border-gray-800">
            <div>
                    @foreach ($errors->all() as $error)
                        <div class="text-xs italic text-red-500">{{$error}}</div>
                    @endforeach
            </div>
        </div>
    @endif
        {{--    <div class="mt-5 px-2 md:mx-12 border border-gray-800">--}}
{{--        <div class="flex py-2 justify-between w-full">--}}
{{--            <h2 class="text-gray-300 flex-grow">Reviews</h2>--}}

{{--        </div>--}}
{{--    </div>--}}
</div>
