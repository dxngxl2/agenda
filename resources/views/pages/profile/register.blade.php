<x-layouts.guest>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-profile.input-label for="name" :value="__('Name')" />
            <x-profile.text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-profile.input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-profile.input-label for="email" :value="__('Email')" />
            <x-profile.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-profile.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-profile.input-label for="password" :value="__('Password')" />

            <x-profile.text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-profile.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-profile.input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-profile.text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-profile.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-profile.primary-button class="ml-4">
                {{ __('Register') }}
            </x-profile.primary-button>
        </div>
    </form>
</x-layouts.guest>
