<div x-data="{
    contactId: {{ $contactId }},
    subscribeToChannel() {
        if (window.EchoChannel === `private-one_to_one_chat.${this.contactId}`) return;

        if (window.EchoChannel) {
            window.Echo.leave(window.EchoChannel);
        }

        window.EchoChannel = `one_to_one_chat.{{ authUser()->id }}`;
        window.Echo.private(window.EchoChannel)
            .listen('MessageSent', (e) => {
                Livewire.dispatch('recieveMessage', { recievedMessage: e });
            });
    }
}" x-on:click="subscribeToChannel(); Livewire.dispatch('contact-clicked', { contactId: contactId });"
    class="bg-white px-3 flex items-center hover:bg-grey-lighter cursor-pointer mb-3" wire:key="{{ $contactId }}">
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
