<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Kasir</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div id="sidebar" class="bg-gray-800 text-white w-64 p-4 transition-transform duration-300 transform">
        <h2 class="text-xl font-bold mb-6">POS Kasir</h2>
        <nav class="flex flex-col gap-3">
            <a href="{{ route('dashboard') }}" class="hover:bg-gray-700 p-2 rounded">Dashboard</a>
            <a href="{{ route('products.index') }}" class="hover:bg-gray-700 p-2 rounded">Produk</a>
            <a href="{{ route('transactions.index') }}" class="hover:bg-gray-700 p-2 rounded">Transaksi</a>
        </nav>
    </div>

    <!-- Konten -->
    <div id="mainContent" class="flex-1 p-6 transition-all duration-300">
        <button id="toggleSidebar" class="bg-blue-600 text-white px-4 py-2 mb-4 rounded">☰</button>
        @yield('content')
    </div>

    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>
</body>

</html>
