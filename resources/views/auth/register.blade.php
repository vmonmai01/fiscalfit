<x-guest-layout>
    <div class="flex justify-center items-center w-full sm:max-w-lg ">
        
        <div class="flex-1">
            <div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- lastname	birthdate	currency_preference	avatar	rol	 -->
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Nombre')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')"  autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!--LastName -->
                    <div>
                        <x-input-label for="lastname" :value="__('Apellido/s')" />
                        <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname"
                            :value="old('lastname')"  autofocus autocomplete="lastname" />
                        <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                    </div>
                    <!-- Birthdate -->
                    <div>
                        <x-input-label for="birthdate" :value="__('Fecha de Nacimiento')" />
                        <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate"
                            :value="old('birthdate')"  autofocus autocomplete="birthdate" />
                        <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                    </div>
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')"  autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Contraseña')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" 
                            autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirme contraseña')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation"  autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <!-- Regitrado ?-->
                    <div class="flex items-center justify-center mt-4 text-center">
                        <a class="underline text-sm text-gray-400 hover:text-amarillo rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                    <!-- Botón registro -->
                    <div class="flex items-center justify-center mt-4 ">                        
                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>            
        </div>
        {{-- Imagen --}}
        <div class="flex-1 h-full ml-2">
            <img src="{{ asset('storage/fiscalfit/register.png') }}" alt="Side Image"
                class="w-full h-full object-cover rounded-lg">
        </div> 
    </div>

</x-guest-layout>
