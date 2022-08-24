<div class="fixed z-50 flex top-32 ">
    <x-modal.dialog wire:model='modalLoginOpen' title='login'  maxWidth="xl" class="">

        @if (Session::has('message'))
                <em class="text-amarelo-800"> {!! session('message') !!}</em>
            @endif



            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 text-sm font-medium text-verde-600">
                    {{ session('status') }}
                </div>
            @endif


            @if($modalLoginType == true)


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
                        <a  wire:click="$toggle('modalLoginType')" class="ml-6 text-sm underline text-cinza-600 hover:text-cinza-900">Registre-se</a>
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

            @else

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Senha') }}" />
                    <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirme a Senha') }}" />
                    <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms"/>

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm underline text-cinza-600 hover:text-cinza-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm underline text-cinza-600 hover:text-cinza-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a wire:click="$toggle('modalLoginType')" class="text-sm underline text-cinza-600 hover:text-cinza-900">
                        {{ __('Já está registrado?') }}
                    </a>


                    <x-button.primary  class="px-5 ml-4">
                        {{ __('Registrar') }}
                    </x-button.primary>
                </div>
            </form>























            @endif


    </x-modal.dialog>
</div>
