<x-guest-layout>
    <x-auth-card>

        <a href="{{ route('home') }}">
            <i class="fa-solid fa-right-from-bracket fa-flip-horizontal"></i>
        </a>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="adress" :value="__('Adress')" />

                <x-text-input id="adress" class="block mt-1 w-full" type="text" name="adress" :value="old('adress')" required />

                <x-input-error :messages="$errors->get('adress')" class="mt-2" />
            </div>

            <!-- Residence -->
            <div class="mt-4">
                <x-input-label for="residence" :value="__('Residence')" />

                <x-text-input id="residence" class="block mt-1 w-full" type="text" name="residence" :value="old('residence')" required />

                <x-input-error :messages="$errors->get('residence')" class="mt-2" />
            </div>

            <!-- Phonenumber -->
            <div class="mt-4">
                <x-input-label for="phonenumber" :value="__('Phonenumber')" />

                <x-text-input id="phonenumber" class="block mt-1 w-full" type="text" name="phonenumber" :value="old('phonenumber')" required />

                <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
