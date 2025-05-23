<form class="space-y-6" wire:submit.prevent='forgetPassword'>
    <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
        <div class="mt-2">
            <input type="text" wire:model='email'
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('email') border-2 border-solid border-red-500 ring-red-500 @enderror @session('success') border-2 border-solid border-green-500 ring-green-500 @endsession">
             @error('email')
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                    <span class="block mt-1 text-sm text-red-600" role="alert">{{ $message }}</span>
                </div>
            @enderror
            @session('success')
                <span class="block mt-1 text-sm text-green-600" role="alert">{{ $value }}</span>
            @endsession
        </div>
    </div>

    <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-900">An OTP will be sent to your provided email address.</label>
    </div>

    <div>
        <button type="submit"
            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
    </div>
</form>
