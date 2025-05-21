<div>
    <form class="space-y-6" action="#" method="POST">

        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
            <div class="mt-2">
                <input type="email" name="email" id="email" autocomplete="email" required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
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

    <p class="mt-10 text-center text-sm/6 text-gray-500">
        Already a member?
        <a href="{{ route('signin') }}" wire:navigate class="font-semibold text-indigo-600 hover:text-indigo-500">Signin now</a>
    </p>
</div>
