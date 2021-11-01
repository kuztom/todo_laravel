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

            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('LOG IN') }}
            </a>

        </div>
        <div class="flex items-center justify-center mt-4">

            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                {{ __('REGISTER') }}
            </a>

        </div>

    </x-auth-card>
</x-guest-layout>
