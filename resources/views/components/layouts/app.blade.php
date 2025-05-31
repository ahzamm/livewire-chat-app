<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel App')</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body>
            {{ $slot }}

    @livewireScripts
</body>

</html>
