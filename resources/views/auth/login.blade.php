<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white dark:bg-gray-800 shadow-lg overflow-hidden sm:rounded-2xl border border-gray-200 dark:border-gray-700">
            
            <div class="flex flex-col items-center mb-8">
                <div class="h-28 w-28 mb-3">
                    <img src="{{ asset('images/login.png') }}" alt="Pizza Logo" class="h-full w-full object-cover rounded-full border-4 border-orange-400 shadow-md">
                </div>
                <h2 class="text-3xl font-extrabold text-orange-600 dark:text-orange-400 tracking-tight">
                    Bienvenido de vuelta
                </h2>
                <p class="mt-2 text-base text-gray-600 dark:text-gray-300 text-center">
                    Por favor, inicia sesión en tu cuenta.
                </p>
            </div>

            <x-validation-errors class="mb-4" />

            @session('status')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ $value }}
                </div>
            @endsession

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <x-label for="email" value="Correo electrónico" />
                    <x-input id="email" class="block w-full mt-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="tu-correo@ejemplo.com" />
                </div>

                <div>
                    <x-label for="password" value="Contraseña" />
                    <x-input id="password" class="block w-full mt-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                </div>

                <div class="flex items-center justify-between mt-2">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-300">Recuérdame</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 dark:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-between gap-3 mt-6">
                    <a class="w-full sm:w-auto text-center px-4 py-2 bg-orange-100 dark:bg-orange-900 text-orange-700 dark:text-orange-200 rounded-md hover:bg-orange-200 dark:hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 font-semibold transition" href="{{ route('register') }}">
                        Registrarse
                    </a>
                    <x-button class="w-full sm:w-auto ms-0 sm:ms-4 bg-orange-500 hover:bg-orange-600 focus:ring-orange-500">
                        Iniciar sesión
                    </x-button>
                </div>

            </form>

        </div>
    </div>
</x-guest-layout>