<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Contraseña') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('Logo.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    <!-- component -->
    <!-- This is an example component -->
    <div class="font-sans">
        <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
            <div class="relative sm:max-w-sm w-full">
                <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
                <div class="card bg-red-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                    <label for="" class="block mt-3 text-sm text-gray-700 text-center font-semibold">
                        Recuperar contraseña
                    </label>
                    <label for="" class="block mt-3 text-sm text-gray-700 text-center font-semibold">
                        ¿Olvidaste tu contraseña? No hay problema. Simplemente háganos saber su dirección de correo
                        electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir
                        una nueva.
                    </label>
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('password.email') }}" class="mt-10">
                        @csrf
                        <div>
                            <input id="email" type="email" name="email" placeholder="Correo electronico"
                                :value="old('email')" required autofocus
                                class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                        </div>
                        <div class="mt-7">
                            <button type="submit"
                                class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                Enviar correo electrónico de recuperación
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    @stack('modals')

    @livewireScripts
</body>

</html>
