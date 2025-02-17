<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <title>Hospital Isidro Ayora de Loja</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #f3f4f6;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 2rem;
                position: relative;
                z-index: 1;
            }
            .header {
                text-align: center;
                margin-bottom: 2rem;
                color: #fff;
            }
            .header h1 {
                font-size: 2.5rem;
                margin: 0;
            }
            .description {
                text-align: center;
                margin-bottom: 2rem;
                font-size: 1.25rem;
                color: #d1d5db;
            }
            .services {
                display: flex;
                flex-wrap: wrap;
                gap: 2rem;
                justify-content: center;
            }
            .service {
                background-color: #fff;
                padding: 1.5rem;
                border-radius: 0.5rem;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                width: 300px;
                text-align: center;
            }
            .service h3 {
                font-size: 1.5rem;
                margin-bottom: 1rem;
            }
            .service p {
                font-size: 1rem;
                color: #6b7280;
            }
            .background-image {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: url('/images/hospital-isidro-ayora.jpg') no-repeat center center;
                background-size: cover;
                z-index: 0;
                opacity: 0.5;
            }
            .background-gradient {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
                z-index: 0;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="background-image"></div>
        <div class="background-gradient"></div>
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-200 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-200 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="container">
                    <div class="header">
                        <h1>Hospital Isidro Ayora de Loja</h1>
                    </div>
                    <div class="description">
                        <p>Bienvenido al portal del Hospital Isidro Ayora de Loja. Ofrecemos una amplia gama de servicios para cuidar de su salud.</p>
                    </div>
                    <div class="services">
                        <div class="service">
                            <h3>Consulta General</h3>
                            <p>Atención médica primaria para todas sus necesidades de salud.</p>
                        </div>
                        <div class="service">
                            <h3>Pediatría</h3>
                            <p>Cuidados especializados para la salud de los niños.</p>
                        </div>
                        <div class="service">
                            <h3>Cardiología</h3>
                            <p>Diagnóstico y tratamiento de enfermedades del corazón.</p>
                        </div>
                        <div class="service">
                            <h3>Ginecología</h3>
                            <p>Servicios de salud para mujeres, incluyendo revisiones y tratamientos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
