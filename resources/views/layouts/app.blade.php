<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pyme360 POS')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('head')
</head>

<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    @include('components.navbar')

    <!-- Contenido Principal -->
    <main>
        @yield('content')
    </main>

    @yield('scripts')
</body>

</html>
