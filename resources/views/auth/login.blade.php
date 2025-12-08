<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tornillo Dorado POS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen overflow-hidden">
    <div class="flex h-full">

        <!-- Panel Izquierdo - Decorativo (Morado) -->
        <div
            class="hidden lg:flex lg:w-2/5 bg-gradient-to-br from-purple-600 via-purple-700 to-purple-800 relative items-center justify-center p-12">
            <!-- Decoración de fondo -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-10 left-10 w-20 h-20 bg-white rounded-full"></div>
                <div class="absolute bottom-20 right-10 w-16 h-16 bg-white rounded-full"></div>
                <div class="absolute top-1/2 left-1/4 w-12 h-12 bg-white rounded-full"></div>
            </div>

            <!-- Contenido -->
            <div class="relative z-10 text-center">
                <!-- Ilustración SVG de Tornillo Dorado -->
                <div class="mb-8">
                    <svg class="w-64 h-64 mx-auto" viewBox="0 0 200 200" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <!-- Tornillo dorado grande -->
                        <g transform="translate(100, 100) rotate(-15)">
                            <!-- Cabeza del tornillo (hexagonal) -->
                            <path d="M 0,-40 L 25,-50 L 40,-25 L 25,0 L 0,10 L -25,0 L -40,-25 L -25,-50 Z"
                                fill="#F59E0B" stroke="#D97706" stroke-width="2" />

                            <!-- Detalle brillo en cabeza -->
                            <path d="M 5,-40 L 20,-45 L 30,-25 L 20,-10 L 5,-5 Z" fill="#FBBF24" opacity="0.6" />

                            <!-- Rosca hexagonal interior -->
                            <circle cx="0" cy="-20" r="12" fill="#92400E" />
                            <path d="M -8,-15 L -8,-25 L 8,-25 L 8,-15 Z" fill="#78350F" />

                            <!-- Cuerpo del tornillo (cilindro) -->
                            <rect x="-15" y="10" width="30" height="100" fill="#F59E0B" stroke="#D97706"
                                stroke-width="2" />

                            <!-- Brillo lateral del cuerpo -->
                            <rect x="-12" y="12" width="10" height="96" fill="#FBBF24" opacity="0.4" />

                            <!-- Roscas del tornillo (líneas diagonales) -->
                            <line x1="-15" y1="20" x2="15" y2="30" stroke="#D97706"
                                stroke-width="2" />
                            <line x1="-15" y1="35" x2="15" y2="45" stroke="#D97706"
                                stroke-width="2" />
                            <line x1="-15" y1="50" x2="15" y2="60" stroke="#D97706"
                                stroke-width="2" />
                            <line x1="-15" y1="65" x2="15" y2="75" stroke="#D97706"
                                stroke-width="2" />
                            <line x1="-15" y1="80" x2="15" y2="90" stroke="#D97706"
                                stroke-width="2" />
                            <line x1="-15" y1="95" x2="15" y2="105" stroke="#D97706"
                                stroke-width="2" />

                            <!-- Punta del tornillo -->
                            <path d="M -15,110 L 0,125 L 15,110 Z" fill="#F59E0B" stroke="#D97706" stroke-width="2" />
                        </g>

                        <!-- Círculo de fondo decorativo -->
                        <circle cx="100" cy="100" r="85" fill="white" opacity="0.1" />

                        <!-- Destellos alrededor -->
                        <circle cx="50" cy="50" r="5" fill="#FBBF24" opacity="0.6" />
                        <circle cx="150" cy="60" r="4" fill="#FBBF24" opacity="0.6" />
                        <circle cx="45" cy="150" r="6" fill="#FBBF24" opacity="0.4" />
                        <circle cx="155" cy="140" r="4" fill="#FBBF24" opacity="0.5" />
                    </svg>
                </div>

                <!-- Texto -->
                <h1 class="text-4xl font-bold text-white mb-4">Tornillo Dorado</h1>
                <p class="text-purple-200 text-lg">Sistema de Punto de Venta</p>
                <p class="text-purple-300 text-sm mt-2">Gestiona tu ferretería de manera profesional</p>
            </div>
        </div>

        <!-- Panel Derecho - Formulario (Blanco) -->
        <div class="flex-1 flex items-center justify-center p-8 bg-white">
            <div class="w-full max-w-md">

                <!-- Logo para móvil -->
                <div class="lg:hidden text-center mb-8">
                    <h1 class="text-3xl font-bold text-purple-700">🔩 Tornillo Dorado</h1>
                    <p class="text-gray-500">Sistema POS</p>
                </div>

                <!-- Título -->
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">Iniciar Sesión</h2>
                    <p class="text-gray-500 mt-2">Ingresa tus credenciales para continuar</p>
                </div>

                <!-- Mensajes de Error -->
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                        <p class="font-medium">❌ Error al iniciar sesión</p>
                        <ul class="mt-1 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulario -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email o Usuario
                        </label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            autofocus
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                            placeholder="admin@tornillodorado.cl">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Contraseña
                        </label>
                        <input type="password" name="password" id="password" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                            placeholder="••••••••">
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember"
                            class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            Recuérdame
                        </label>
                    </div>

                    <!-- Botón Login -->
                    <button type="submit"
                        class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        Iniciar Sesión
                    </button>
                </form>

                <!-- Footer -->
                <p class="mt-8 text-center text-sm text-gray-500">
                    Pyme360 POS &copy; {{ date('Y') }}
                </p>
            </div>
        </div>
    </div>
</body>

</html>
