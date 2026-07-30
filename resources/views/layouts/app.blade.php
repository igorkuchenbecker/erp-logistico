<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ERP Logístico')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = { darkMode: 'class' }
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-950 text-gray-900 dark:text-gray-100 min-h-screen transition-colors">
    <nav class="bg-emerald-800 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-6">
                <a href="{{ route('dashboard') }}" class="text-xl font-bold">Vix Logística</a>
                <a href="{{ route('ufs.index') }}" class="text-sm text-emerald-200 hover:text-white transition">UFs</a>
                <a href="{{ route('rastreamento.index') }}" class="text-sm text-emerald-200 hover:text-white transition">Rastreamento</a>
                <a href="{{ route('dashboard') }}" class="text-sm text-emerald-200 hover:text-white transition">Dashboard</a>
            </div>
            <div class="flex items-center gap-3">
                <button id="darkToggle"
                    class="text-emerald-200 hover:text-white text-lg transition p-1 leading-none"
                    title="Alternar modo escuro">&#9790;</button>
                <a href="{{ route('ufs.create') }}"
                   class="bg-white text-emerald-800 px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition">
                    + Nova UF
                </a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-6">
        @if (session('success'))
            <div class="bg-green-100 dark:bg-green-900 dark:text-green-200 border border-green-400 dark:border-green-700 text-green-800 px-4 py-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <script>
    (function() {
        const html = document.documentElement;
        const btn = document.getElementById('darkToggle');
        const stored = localStorage.getItem('darkMode');
        if (stored === 'on') html.classList.add('dark');
        btn.textContent = html.classList.contains('dark') ? '\u2600' : '\u263E';
        btn.addEventListener('click', function() {
            html.classList.toggle('dark');
            const isDark = html.classList.contains('dark');
            localStorage.setItem('darkMode', isDark ? 'on' : 'off');
            btn.textContent = isDark ? '\u2600' : '\u263E';
        });
    })();
    </script>

    @stack('scripts')
</body>
</html>
