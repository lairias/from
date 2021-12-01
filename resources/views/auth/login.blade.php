<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class="block h-20 w-auto" >
                <img src= "../../vendor/adminlte/dist/img/SecSystemLogo.png"style="width:100px;">
            </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif


        <form method="POST" action="{{ route('login') }}" class="formulario" id="formulario">
            @csrf

            <!-- Grupo: Correo Electronico -->
            <div  id="grupo__email">
                <x-jet-label for="email" class="formulario__label" value="{{ __('Correo') }}"/>
                <div class="formulario__grupo-input">
                    <x-jet-input type="email" class="block mt-1 w-full" name="email" id="email" placeholder="correo@correo.com" :value="old('email')" required autofocus />
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El correo solo puede contener letras, números y guiones, no caracteres especiales ni espacios. Ejem. usuario8@gmail.com</p>
            </div>

             <!-- Grupo: Contraseña -->
            <div class="mt-4" id="grupo__password">
                <x-jet-label for="password" class="formulario__label" value="{{ __('Contraseña') }}"/>
                <div class="formulario__grupo-input">
                    <x-jet-input type="password" class="block mt-1 w-full" name="password" id="password" required autocomplete="current-password" />
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">La contraseña debe tener al menos 8 caracteres y solo puede contener numeros, letras y guiones, no caracteres especiales (%,&) ni espacios.</p>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 ml-2" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="ml-2">
                    {{ __('Iniciar sesion') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
