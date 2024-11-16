<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray dark:text-gray-200">
            {{ __('Controle de Ativos') }}
        </h1>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Senha -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" /> <!-- Alterar o label -->

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Lembre de Mim -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Lembre de Mim') }} 🤔</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            <div>
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Esqueci minha senha') }}
                </a>
                @endif
            </div>

            <x-primary-button class="ms-3">
                {{ __('Acessar') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Botão para fazer cadastro -->
    <div class="flex items-center justify-center mt-4">
        <a href="{{ route('register') }}" class="btn btn-outline-primary">
            {{ __('Não tem conta? Cadastre-se') }} 📋
        </a>
    </div>
</x-guest-layout>