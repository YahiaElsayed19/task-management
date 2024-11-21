<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="container mx-auto mt-10 mb-10 max-w-3xl">
    @if (session('success'))
        <div role="alert"
            class="my-8 rounded-md border-s-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
            <p class="font-bold">Success!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    @if (session('error'))
        <div role="alert" class="my-8 rounded-md border-s-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">
            <p class="font-bold">Error!</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif
    {{ $slot }}
</body>

</html>
