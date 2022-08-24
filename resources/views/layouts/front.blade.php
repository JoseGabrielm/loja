<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body class="container mx-auto bg-cinza-200">

        <div class="container mx-auto bg-supreme-ecinco">
            <!-- Logo -->
                <x-nav.navigation-menu/>
        </div>


    <!-- Page Content -->
    <main class="relative">
        {{ $slot }}
    </main>

    <footer>
        @include('layouts.footer')
    </footer>

    @stack('modals')
    @livewireScripts
</body>

</html>
