<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body class="container mx-auto bg-cinza-200">



    <div class="container mx-auto bg-supreme-ecinco ">


        <!-- permitir acesso e utilização do carrinho mesmo sem o usuário estar logado -->

        <x-nav.navigation-menu />



        <!-- Page Heading -->
        @if (isset($header))
            <header class="shadow bg-branco">
                <div class="px-4 py-6 mx-auto w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>









    <footer>


        <div class="container relative z-50 ">

            <div class="flex flex-column">


                <div class="">
                    <a href="https://wa.me/5519993987797" target="_blank">

                        <img class="fixed bottom-0 right-0 z-40 w-24 p-5 "
                            src="{{ asset('storage/whatsapp-logo-1.png') }}" alt="whatsapp">
                    </a>



                </div>


            </div>

        </div>

        @include('layouts.footer')

    </footer>

    @stack('modals')

    @livewireScripts
</body>

</html>
