<x-guest-layout>
    <x-app-layout>
        <x-jet-authentication-card>
            <x-slot name="logo">
                <div class="block h-20 w-auto">
                    <img src="../../vendor/adminlte/dist/img/SecSystemLogo.png" style="width:100px;">
                </div>
            </x-slot>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{route('admin.passwordtime.update', $id)}}">
                @method('PATCH')
                @csrf
                @foreach ($seguridad3 as $seguri)
                    <input type="hidden" name="fecha" value={{$seguri->dato}}>
                @endforeach

                <div>
                    <x-jet-label for="current_password" value="{{ __('Contraseña') }}" />
                    <x-jet-input id="current_password" class="block mt-1 w-full" type="password" name="current_password" :value="old('current_password')"  autofocus autocomplete="current_password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Confirmar Contraseña') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" />
                </div>


                <div class="flex items-center justify-end mt-4">

                    <x-jet-button class="ml-4">
                        {{ __('Actualizar') }}
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>

    </x-app-layout>
</x-guest-layout>
