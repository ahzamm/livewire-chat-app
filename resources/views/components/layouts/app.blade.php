<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <div>
        <div class="w-full h-32 bg-white"></div>
        <div class="container mx-auto" style="margin-top: -128px;">
            <div class="py-6 h-screen">
                <div class="flex h-full">

                    <!-- Left -->
                   <livewire:contact-list />

                    <!-- Right -->
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
    {{-- <script>
        document.addEventListener('livewire:load', () => {
            console.log('Livewire message processed');
            Livewire.hook('message.processed', (message, component) => {
                const el = document.querySelector('[x-ref="container"]');
                if (el) {
                    el.scrollTop = el.scrollHeight;
                }
            })
        })
    </script> --}}

</body>

</html>
