<form class="space-y-6" wire:submit.prevent='resetPassword'>
    <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
        <div class="mt-2">
            <input type="text" wire:model='email'
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('email') border-2 border-solid border-red-500 ring-red-500 @enderror">
            @error('email')
                <span class="block mt-1 text-sm text-red-600" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div>
        <div class="flex items-center justify-between">
            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
        </div>
        <div class="mt-2">
            <input type="password" wire:model='password'
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('password') border-2 border-solid border-red-500 ring-red-500 @enderror">
            @error('password')
                <span class="block mt-1 text-sm text-red-600" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div>
        <div class="flex items-center justify-between">
            <label for="confirm_password" class="block text-sm/6 font-medium text-gray-900">Confirm Password</label>
        </div>
        <div class="mt-2">
            <input type="password" wire:model='password_confirmation'
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('password') border-2 border-solid border-red-500 ring-red-500 @enderror">
            @error('password_confirmation')
                <span class="block mt-1 text-sm text-red-600" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div>
        <button type="submit"
            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
    </div>
</form>
