<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
        <div class="flex items-center justify-center mt-4">
            <p class="text-4xl">Best To-Do list manager</p>
        </div>
        <div class="flex items-center justify-center mt-4">
            <p>Please log in to start</p>
        </div>

        <div class="flex items-center justify-center mt-4">

            <button class="bg-blue-500 text-sm text-white hover:bg-blue-600 px-4 py-3 rounded"><a
                    href="{{ route('login') }}">
                    {{ __('LOG IN') }}
                </a></button>
            <span class="p-3"></span>
            <button class="bg-blue-500 text-sm text-white hover:bg-blue-600 px-4 py-3 rounded"><a
                    href="{{ route('register') }}">
                    {{ __('REGISTER') }}
                </a></button>

        </div>

    </x-auth-card>
</x-guest-layout>
