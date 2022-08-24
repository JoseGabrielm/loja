<div class="fixed z-50 flex top-32 ">
    <x-modal.dialog wire:model='modalStoresOpen' title='login'  maxWidth="xl" class="">

        @if (Session::has('message'))
                <em class="text-amarelo-800"> {!! session('message') !!}</em>
            @endif



            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 text-sm font-medium text-verde-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Senha') }}" />
                    <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-cinza-600">{{ __('Lembre-me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm underline text-cinza-600 hover:text-cinza-900">
                            {{ __('Esqueceu a senha?') }}
                        </a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-6 text-sm underline text-cinza-600 hover:text-cinza-900">Registre-se</a>
                    @endif


                    @if (Route::currentRouteName('carrinho'))


                    <x-button.primary class="px-5 ml-4" >
                         {{ __('Entrar') }}
                    </x-button.primary>



                    @else



                    <x-button.primary class="px-5 ml-4">
                        {{ 'Entrar' }}
                    </x-button.primary>
                    @endif





                </div>
            </form>
    </x-modal.dialog>
</div>
