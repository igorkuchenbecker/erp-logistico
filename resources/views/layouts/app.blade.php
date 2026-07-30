<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ERP Logístico')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-emerald-800 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-6">
                <a href="{{ route('dashboard') }}" class="text-xl font-bold">Vix Logística</a>
                <a href="{{ route('ufs.index') }}" class="text-sm text-emerald-200 hover:text-white transition">UFs</a>
                <a href="{{ route('rastreamento.index') }}" class="text-sm text-emerald-200 hover:text-white transition">Rastreamento</a>
                <a href="{{ route('dashboard') }}" class="text-sm text-emerald-200 hover:text-white transition">Dashboard</a>
            </div>
            <a href="{{ route('ufs.create') }}"
               class="bg-white text-emerald-800 px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition">
                + Nova UF
            </a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-6">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
    @stack('scripts')
</body>
</html>
