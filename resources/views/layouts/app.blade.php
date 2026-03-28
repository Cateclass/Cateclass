<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CateClass') }}</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex bg-[#E5ECFF] h-screen font-sans antialiased text-gray-900">

@if(auth()->check())
    @if(auth()->user()->tipo_usuario === 'catequista')
        @include('layouts.sidebars.catequista')
    @elseif(auth()->user()->tipo_usuario === 'catequizando')
        @include('layouts.sidebars.catequizando')
    @elseif(auth()->user()->tipo_usuario === 'coordenador')
        @include('layouts.sidebars.coordenador')
    @endif
@endif

<main class="flex-1 p-8 overflow-y-auto">
    {{ $slot }}
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menu-toggle');
        const menuClose = document.getElementById('menu-close');
        function openMenu() {
            if (sidebar) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
            }
        }
        function closeMenu() {
            if (sidebar) {
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('-translate-x-full');
            }
        }
        if (menuToggle) {
            menuToggle.addEventListener('click', openMenu);
        }
        if (menuClose) {
            menuClose.addEventListener('click', closeMenu);
        }
    });
</script>
</body>
</html>
