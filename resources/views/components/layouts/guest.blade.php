<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel App')</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-900">
    {{ $slot }}
    @livewireScripts
</body>

</html>
