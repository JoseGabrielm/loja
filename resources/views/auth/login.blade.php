<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <h1 class="text-4xl text-amarelo-800 font-extrabold italic " > Supreme </h1>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-verde-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Senha') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-cinza-600">{{ __('Lembre-me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="underline text-sm text-cinza-600 hover:text-cinza-900">
                        {{ __('Esqueceu a senha?') }}
                    </a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="underline text-sm text-cinza-600 hover:text-cinza-900 ml-6">Registre-se</a>
                @endif

                <x-button.primary class="ml-4 px-5">
                    {{ __('Entrar') }}
                </x-button.primary>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
