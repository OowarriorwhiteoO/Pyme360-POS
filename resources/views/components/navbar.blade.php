<nav class="bg-gray-900 shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-20">

            <!-- Logo/Marca -->
            <div class="flex items-center space-x-3">
                <span class="text-2xl">🔩</span>
                <span class="text-white font-bold text-xl hidden md:block">Tornillo Dorado</span>
            </div>

            <!-- Botones de Navegación -->
            <div class="flex items-center space-x-2 md:space-x-4">

                <!-- Botón Inicio -->
                <a href="{{ route('dashboard') }}"
                    class="relative flex flex-col items-center justify-center w-16 h-16 md:w-20 md:h-16 rounded-xl transition-all group {{ request()->routeIs('dashboard') ? 'bg-gray-800' : 'hover:bg-gray-800' }}">

                    <!-- Indicador Verde Flotante (solo si está activo) -->
                    @if (request()->routeIs('dashboard'))
                        <div
                            class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-10 h-10 bg-green-500 rounded-full flex items-center justify-center shadow-lg animate-pulse">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                    @endif

                    <!-- Icono -->
                    <svg class="w-6 h-6 {{ request()->routeIs('dashboard') ? 'hidden' : 'text-gray-400 group-hover:text-white' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span
                        class="text-xs {{ request()->routeIs('dashboard') ? 'text-green-400' : 'text-gray-400 group-hover:text-white' }} mt-1 hidden md:block">Inicio</span>
                </a>

                <!-- Botón Ventas -->
                <a href="{{ route('sales.create') }}"
                    class="relative flex flex-col items-center justify-center w-16 h-16 md:w-20 md:h-16 rounded-xl transition-all group {{ request()->routeIs('sales.*') ? 'bg-gray-800' : 'hover:bg-gray-800' }}">

                    <!-- Indicador Verde Flotante -->
                    @if (request()->routeIs('sales.*'))
                        <div
                            class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-10 h-10 bg-green-500 rounded-full flex items-center justify-center shadow-lg animate-pulse">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    @endif

                    <svg class="w-6 h-6 {{ request()->routeIs('sales.*') ? 'hidden' : 'text-gray-400 group-hover:text-white' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span
                        class="text-xs {{ request()->routeIs('sales.*') ? 'text-green-400' : 'text-gray-400 group-hover:text-white' }} mt-1 hidden md:block">Ventas</span>
                </a>

                <!-- Botón Productos -->
                <a href="{{ route('products.index') }}"
                    class="relative flex flex-col items-center justify-center w-16 h-16 md:w-20 md:h-16 rounded-xl transition-all group {{ request()->routeIs('products.*') ? 'bg-gray-800' : 'hover:bg-gray-800' }}">

                    <!-- Indicador Verde Flotante -->
                    @if (request()->routeIs('products.*'))
                        <div
                            class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-10 h-10 bg-green-500 rounded-full flex items-center justify-center shadow-lg animate-pulse">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                    @endif

                    <svg class="w-6 h-6 {{ request()->routeIs('products.*') ? 'hidden' : 'text-gray-400 group-hover:text-white' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span
                        class="text-xs {{ request()->routeIs('products.*') ? 'text-green-400' : 'text-gray-400 group-hover:text-white' }} mt-1 hidden md:block">Productos</span>
                </a>

                <!-- Separador -->
                <div class="h-10 w-px bg-gray-700 mx-2"></div>

                <!-- Usuario y Logout -->
                <div class="relative group">
                    <button class="flex items-center space-x-2 px-3 py-2 rounded-lg hover:bg-gray-800 transition">
                        <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="hidden md:block text-left">
                            <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-400">Administrador</p>
                        </div>
                    </button>

                    <!-- Dropdown Menu -->
                    <div
                        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 hidden group-hover:block z-50">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span>Cerrar Sesión</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
