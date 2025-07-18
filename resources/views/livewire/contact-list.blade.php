<div class="w-1/3 border flex flex-col">

    <!-- Header -->
    <div class="py-2 px-3 bg-grey-lighter flex flex-row justify-between items-center bg-[#449388]">
        <div>
            <img class="w-10 h-10 rounded-full" src="{{ authUser()->getFirstMedia() ?? asset(config('constant.default_image')) }}" />
        </div>

        <div class="flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="white"
                        d="M12 20.664a9.163 9.163 0 0 1-6.521-2.702.977.977 0 0 1 1.381-1.381 7.269 7.269 0 0 0 10.024.244.977.977 0 0 1 1.313 1.445A9.192 9.192 0 0 1 12 20.664zm7.965-6.112a.977.977 0 0 1-.944-1.229 7.26 7.26 0 0 0-4.8-8.804.977.977 0 0 1 .594-1.86 9.212 9.212 0 0 1 6.092 11.169.976.976 0 0 1-.942.724zm-16.025-.39a.977.977 0 0 1-.953-.769 9.21 9.21 0 0 1 6.626-10.86.975.975 0 1 1 .52 1.882l-.015.004a7.259 7.259 0 0 0-5.223 8.558.978.978 0 0 1-.955 1.185z">
                    </path>
                </svg>
            </div>
            <div class="ml-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="white"
                        d="M19.005 3.175H4.674C3.642 3.175 3 3.789 3 4.821V21.02l3.544-3.514h12.461c1.033 0 2.064-1.06 2.064-2.093V4.821c-.001-1.032-1.032-1.646-2.064-1.646zm-4.989 9.869H7.041V11.1h6.975v1.944zm3-4H7.041V7.1h9.975v1.944z">
                    </path>
                </svg>
            </div>
            <div x-data="{ open: false }" class="relative ml-4">
                <!-- SVG Trigger -->
                <div @click="open = !open" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="white" d="M12 7a2 2 0 1 0-.001-4.001A2 2 0 0 0 12 7zm0 2a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 9zm0 6a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 15z"></path>
                    </svg>
                </div>

                <!-- Dropdown Menu -->
                <div
                    x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-32 bg-white border border-gray-200 rounded-md shadow-lg z-50" x-transition>
                    <form method="POST" action="{{ route('signout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Search -->
    <div class="py-2 px-2 bg-grey-lightest">
        <input type="text" wire:model.live='contactSearch' class="w-full px-2 py-2 text-sm" placeholder="Search or start new chat" />
    </div>

    <!-- Contacts -->
    <div class="bg-grey-lighter flex-1 overflow-auto">
        @foreach ($contacts as $contact)
            <livewire:contact-item :contact="$contact" :wire:key="'contact-'.$contact->id" />
        @endforeach
    </div>

</div>
