<?php
$articles = [
    [
        'title' => 'Introducción a Tailwind CSS',
        'date' => '28 mayo 2025',
        'desc' => 'Aprende cómo empezar a usar Tailwind CSS para crear interfaces modernas y responsivas.',
        'img' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=600&q=80',
        'color' => 'text-blue-700'
    ],
    [
        'title' => '¿Qué es PHP y para qué sirve?',
        'date' => '27 mayo 2025',
        'desc' => 'Una guía rápida sobre PHP y su importancia en el desarrollo web moderno.',
        'img' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=600&q=80',
        'color' => 'text-purple-700'
    ],
    [
        'title' => 'Mis herramientas favoritas de desarrollo',
        'date' => '26 mayo 2025',
        'desc' => 'Descubre las herramientas que uso a diario para programar y diseñar.',
        'img' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80',
        'color' => 'text-pink-700'
    ],
    [
        'title' => 'Cómo organizar tu código',
        'date' => '25 mayo 2025',
        'desc' => 'Consejos prácticos para mantener tu código limpio y organizado.',
        'img' => 'https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=600&q=80',
        'color' => 'text-blue-700'
    ],
    [
        'title' => '¿Por qué aprender JavaScript?',
        'date' => '24 mayo 2025',
        'desc' => 'Las razones por las que JavaScript es esencial para cualquier desarrollador web.',
        'img' => 'https://images.unsplash.com/photo-1461344577544-4e5dc9487184?auto=format&fit=crop&w=600&q=80',
        'color' => 'text-purple-700'
    ],
    [
        'title' => 'Mi experiencia aprendiendo programación',
        'date' => '23 mayo 2025',
        'desc' => 'Un vistazo personal a mi camino en el mundo del desarrollo.',
        'img' => 'https://images.unsplash.com/photo-1470770841072-f978cf4d019e?auto=format&fit=crop&w=600&q=80',
        'color' => 'text-pink-700'
    ]
];
?>
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-2 drop-shadow">Artículos Recientes</h2>
            <p class="text-lg text-gray-600">Descubre los últimos temas sobre desarrollo web, tecnología y más.</p>
        </div>
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($articles as $article): ?>
                <article class="bg-white rounded-2xl shadow-sm hover:shadow-md overflow-hidden hover:scale-102 transition transform duration-300 cursor-pointer">
                    <img src="<?= htmlspecialchars($article['img']) ?>" alt="<?= htmlspecialchars($article['title']) ?>" class="w-full h-40 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold <?= $article['color'] ?> mb-2"><?= htmlspecialchars($article['title']) ?></h3>
                        <p class="text-gray-600 mb-4"><?= htmlspecialchars($article['desc']) ?></p>
                        <span class="text-sm text-gray-400"><?= htmlspecialchars($article['date']) ?></span>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-10">
            <a href="/blog.php" class="inline-block px-8 py-3 bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white font-bold rounded-full shadow-lg hover:scale-105 transition text-lg">
                Ver todos los artículos
            </a>
        </div>
    </div>
</section>