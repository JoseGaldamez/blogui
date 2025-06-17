<header class="fixed top-0 left-0 w-full bg-gradient-to-r from-blue-900 via-purple-900 to-gray-900 shadow-lg z-50">
    <div class="bg-gradient-to-r from-blue-900 via-purple-900 to-gray-900 shadow-lg">
    <div class="container mx-auto flex justify-between items-center py-4 px-4 md:px-0">
        <!-- Logo y nombre -->
        <div class="flex items-center space-x-3">
            <a href="/admin/" class="flex items-center space-x-2">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Logo" class="w-10 h-10 rounded-full shadow border-2 border-white bg-white">
                <span class="text-white text-2xl font-extrabold drop-shadow">Blogui</span>
                <span class="text-white text-sm">(Admin)</span>
            </a>
        </div>
        <!-- Menú de navegación -->
        <nav>
            <ul class="hidden md:flex space-x-6 items-center">
                <li><a href="/admin/dashboard.php" class="text-white/90 hover:text-white font-medium transition">Dashboard</a></li>
                <li><a href="/admin/profile.php" class="text-white/90 hover:text-white font-medium transition">Gestionar perfil</a></li>
                <li><a href="/admin/statistics.php" class="text-white/90 hover:text-white font-medium transition">Estadísticas</a></li>
                <li><a href="/admin/new-post.php" class="text-white/90 hover:text-white font-medium transition">Nuevo post</a></li>
                <li>
                    <a href="/admin/close.php" class="bg-red-400 hover:bg-red-500 text-white font-bold rounded-full px-6 py-2 shadow transition">
                        Cerrar sesión
                    </a>
                </li>
            </ul>
            <!-- Botón menú móvil -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-white focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </nav>
    </div>
    <!-- Menú móvil -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
        <ul class="flex flex-col space-y-2">
            <li><a href="/admin/dashboard.php" class="block text-white/90 hover:text-white font-medium transition">Dashboard</a></li>
            <li><a href="/admin/profile.php" class="block text-white/90 hover:text-white font-medium transition">Gestionar perfil</a></li>
            <li><a href="/admin/statistics.php" class="block text-white/90 hover:text-white font-medium transition">Estadísticas</a></li>
            <li><a href="/admin/new-post.php" class="block text-white/90 hover:text-white font-medium transition">Nuevo post</a></li>
            <li>
                <a href="/admin/close.php" class="block bg-white/90 hover:bg-pink-200 text-pink-600 font-bold rounded-full px-6 py-2 shadow transition text-center">
                    Cerrar sesión
                </a>
            </li>
        </ul>
    </div>
    <script>
        // Simple toggle para menú móvil
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        });
    </script>
</div>
</header>