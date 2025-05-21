<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel App')</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-900">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="{{ Vite::asset($logo) }}" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">{{ $heading }}</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            {{ $slot }}

            <p class="mt-10 text-center text-sm/6 text-gray-500">{!! $footer !!}</p>
        </div>
    </div>

    @livewireScripts
</body>

</html>
