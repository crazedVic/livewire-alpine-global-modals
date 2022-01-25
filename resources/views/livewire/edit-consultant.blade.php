<div class="mx-auto max-w-2xl">
    <div class="flex justify-between items-end mb-5">
        <div class="flex justify-around items-baseline space-x-1 mr-8 text-blue-300">
            <span class="text-2xl">Consultant</span>
            <span class="text-xs text-blue-400">@if($edit_id)Edit @else New @endif</span>
        </div>
        <div class="select-none cursor-pointer text-xs">
            <a class="border-b border-blue-400" wire:click="save()">Save</a>&nbsp;&nbsp;<a class="text-gray-400 " href="/">Cancel</a>
        </div>
    </div>
    <form class="p-1 md:px-2 mx-2 lg:mx-4 border border-gray-800 pb-1 ">
        <h2 class="text-gray-300">Contact Information</h2>
        <x-alpine-input model="consultant" property="name" label="Full Name"/>
        <x-alpine-input model="consultant" property="company" label="Company Name (opt)"/>
        <x-alpine-input model="consultant" property="phone" label="Phone"/>
        <x-alpine-input model="consultant" property="email" label="Email"/>
        <div class="text-xs ml-1 text-gray-400">Billing Details</div>
        <div class="flex flex-col lg:flex-row w-full justify-between lg:space-x-2 items-start mt-0.25 mb-1.5">
            <label for="consultant.rate_currency" class="block flex-shrink w-full lg:w-auto">
                <div class="relative">
                    <select class="block appearance-none w-full bg-gray-600 rounded-md text-gray-300 min-w-fit
                            py-1.5 pl-4 pr-8 my-0.5 rounded leading-tight focus:outline-none focus:bg-gray-600 focus:rounded-md
                            @error('consultant.rate_currency') outline outline-1 outline-red-500 outline-offset-4 @enderror
                        focus:rounded-none" wire:model="consultant.rate_currency" type="text" id="consultant.rate_currency">
                    <option selected>CAD$</option>
                    <option>USD$</option>
                    <option>Euro</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 bg-gray-600 text-gray-600 rounded-lg">
                        <svg class="fill-current h-3 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
                @error('consultant.rate_currency') <div class="text-red-400 text-right italic text-xxs mt-1">{{ $message }}</div> @enderror
            </label>
            <label for="rate" class="block flex-grow w-full lg:w-auto my-1 lg:my-0">
                <input wire:model="consultant.rate" type="text" id="rate"
                       class="bg-gray-600 text-white py-1 px-4 my-0.5 w-full focus:outline-none focus:bg-gray-500 focus:border
                       focus:border-blue-600 rounded-md
                @error('consultant.rate') outline outline-1 outline-red-500 outline-offset-4  @enderror" placeholder="Billing Rate" autocomplete="nope" >
                @error('consultant.rate') <div class="text-red-400 text-right italic text-xxs my-0">{{ $message }}</div> @enderror
            </label>
            <label for="rate_frequency" class="block flex-shrink w-full lg:w-auto">
                <div class="relative  min-w-fit">
                    <select class="block appearance-none w-full bg-gray-600 rounded-md text-gray-300
                            py-1.5 pl-4 pr-8 my-0.5 rounded leading-tight focus:outline-none focus:bg-gray-600 focus:rounded-md
                            @error('consultant.rate_frequency') outline outline-1 outline-red-500 outline-offset-4 @enderror
                        focus:rounded-none" wire:model="consultant.rate_frequency" type="text" id="consultant.rate_frequency">
                        <option value="" selected>Frequency</option>
                        <option>Per Hour</option>
                        <option>Per Day</option>
                        <option>Per Month</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 bg-gray-600 text-gray-600 rounded-lg">
                        <svg class="fill-current h-3 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
                @error('consultant.rate_frequency') <div class="text-red-400 text-right italic text-xxs mt-1">{{ $message }}</div> @enderror
            </label>
        </div>
        <label for="platform" class="block w-full mt-1 mb-1.5"  x-data="{show:false,platform:@entangle('consultant.platform')}">
            <div class="text-xs ml-1 mb-0.25 text-gray-400" x-show="show || (platform && platform.length > 0)" x-cloak x-transition.duration.1000ms>Freelance Platform</div>
            <div class="relative">
                <select class="block appearance-none w-full bg-gray-600 rounded-md text-gray-300
                        py-1.5 pl-4 pr-8 my-0.5 rounded leading-tight focus:outline-none focus:bg-gray-600
                        @error('consultant.platform') outline outline-1 outline-red-500 outline-offset-4 @enderror
                    focus:rounded-none" wire:model="consultant.platform" type="text" id="consultant.platform"
                        x-on:focus="show=true" x-on:blur="show=false" x-model="platform">
                    <option value="" selected>Select Platform</option>
                    <option value="None">None/Direct</option>
                    <option>Freelancer</option>
                    <option>Fiverr</option>
                    <option>Upwork</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 bg-gray-600 text-gray-600 rounded-lg">
                    <svg class="fill-current h-3 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </div>
            </div>
            @error('consultant.platform') <div class="text-red-400 text-right italic text-xxs my-1">{{ $message }}</div> @enderror
        </label>
        <x-alpine-input model="consultant" property="platform_profile" label="Freelance Platform Profile"
                        :hidden="!($consultant && ($consultant->platform != 'None' && $consultant->platform != ''))"/>

       <x-alpine-input model="consultant" property="linkedin" label="LinkedIn Profile"/>
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
                @if(!$tag->trashed() || ($tag->trashed() && in_array($tag->id, $selected_tags)))
                <a class="align-middle color-white rounded-md px-1 py-0.5 text-xs mx-0.25 my-0.25 cursor-pointer select-none
                @if( in_array($tag->id, $selected_tags) && $tag->trashed() )
                    bg-gray-800 text-gray-500 line-through
                @elseif (in_array($tag->id, $selected_tags))
                    bg-green-700
                @else
                    bg-gray-700
                @endif"
                wire:click="toggleTag({{$tag->id}})">{{$tag->name}}</a>
                @endif
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
                wire:model="consultant.notes"
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
    <span class="hidden lg:block xl:hidden">LG</span>
    <span class="hidden md:block lg:hidden">MD</span>
    <span class="hidden sm:block md:hidden">SM</span>
    <span class="hidden xl:block 2xl:hidden">XL</span>
</div>
