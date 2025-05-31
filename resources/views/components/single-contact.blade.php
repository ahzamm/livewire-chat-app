<div class="bg-white px-3 flex items-center hover:bg-grey-lighter cursor-pointer mb-3">
    <div>
        <img class="h-12 w-12 rounded-full" src="{{ $avatar }}" />
    </div>
    <div class="ml-4 flex-1 border-b border-grey-lighter py-4">
        <div class="flex items-bottom justify-between">
            <p class="text-grey-darkest">
                {{ $contactName }}
            </p>
            <p class="text-xs text-grey-darkest">
                {{ $lastMessageTime }}
            </p>
        </div>
        <p class="text-grey-dark mt-1 text-sm">
            {{ $lastMessage }}
        </p>
    </div>
</div>
