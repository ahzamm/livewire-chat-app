<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel App')</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-900">
    <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            {{ $slot }}
        </div>
    </div>

    @livewireScripts
</body>

</html>
