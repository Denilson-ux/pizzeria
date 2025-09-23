<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white dark:bg-gray-800 shadow-lg overflow-hidden sm:rounded-2xl border border-gray-200 dark:border-gray-700">
            <div class="flex flex-col items-center mb-8">
                <div class="h-24 w-24 mb-3">
                    <img src="{{ asset('images/password.png') }}" alt="Pizza Logo" class="h-full w-full object-cover rounded-full border-4 border-orange-400 shadow-md">
                </div>
                <h2 class="text-2xl font-extrabold text-orange-600 dark:text-orange-400 tracking-tight">
                    ¿Olvidaste tu contraseña?
                </h2>
                <p class="mt-2 text-base text-gray-600 dark:text-gray-300 text-center">
                    No te preocupes. Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
                </p>
            </div>

            @session('status')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ $value }}
                </div>
            @endsession

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block w-full mt-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="tu-correo@ejemplo.com" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <x-button class="bg-orange-500 hover:bg-orange-600 focus:ring-orange-500">
                        Enviar enlace de restablecimiento
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
