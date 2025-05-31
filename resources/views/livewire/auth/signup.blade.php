<form class="space-y-6" wire:submit.prevent='signup'>
    <div x-data="imagePreview" class="relative">
        <label for="avatar" class="block text-sm/6 font-medium text-gray-900">Avatar</label>
        <div class="mt-2 flex items-center gap-4">
            <div class="relative">
                <input
                    type="file" wire:model="avatar" accept="image/*" x-ref="myFile" @change="previewFile" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />
                <div
                    class="inline-block px-3 py-1.5 bg-indigo-600 text-white rounded-md text-sm font-medium pointer-events-none">
                    Choose Avatar
                </div>
            </div>
            <template x-if="imgsrc">
                <img :src="imgsrc" class="w-16 h-16 rounded-full object-cover ring-1 ring-gray-300 shadow-sm" />
            </template>
        </div>

        @error('avatar')
            <span class="block mt-1 text-sm text-red-600" role="alert">{{ $message }}</span>
        @enderror
    </div>

    <script>
        function imagePreview() {
            return {
                imgsrc: null,
                previewFile() {
                    let file = this.$refs.myFile.files[0];
                    if (!file || file.type.indexOf('image/') === -1) return;
                    this.imgsrc = null;
                    let reader = new FileReader();

                    reader.onload = e => {
                        this.imgsrc = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            }
        }
    </script>

    <div>
        <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
        <div class="mt-2">
            <input type="text" wire:model='name'
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('name') border-2 border-solid border-red-500 ring-red-500 @enderror">
            @error('name')
                <span class="block mt-1 text-sm text-red-600" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
        <div class="mt-2">
            <input type="email" wire:model='email'
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
            <input type="password" wire:model='password' autocomplete
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
            <input type="password" wire:model='password_confirmation' autocomplete
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('password') border-2 border-solid border-red-500 ring-red-500 @enderror">
            @error('password_confirmation')
                <span class="block mt-1 text-sm text-red-600" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div>
        <button type="submit"
            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
            up</button>
    </div>
</form>
