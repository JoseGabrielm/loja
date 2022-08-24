<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body class="bg-cinza-200">

    <nav>
        @include('livewire.admin.layouts.menu')
        @include('livewire.admin.layouts.navbar')
    </nav>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>


    @stack('modals')

    @livewireScripts
</body>

</html>
