<div class="flex mb-2">
    <div class="rounded py-2 px-3" style="background-color: #F2F2F2">
        @if ($contactName)
            <p class="text-sm text-teal">
                {{ $contactName }}
            </p>
        @endif
        <p class="text-sm mt-1">
            {{ $recievedMessage }}
        </p>
        <p class="text-right text-xs text-grey-dark mt-1">
            {{ $recievedAt }}
        </p>
    </div>
</div>
