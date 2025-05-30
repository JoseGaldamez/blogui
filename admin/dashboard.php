<!DOCTYPE html>
<html lang="es">
    <?php include '../includes/head.php'; ?>
<body>
    <?php include '../includes/admin/admin-menu.php'; ?>

    <main class="max-w-4xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Panel de Administración</h1>
        <p class="mb-6">Bienvenido al panel de administración. Aquí puedes gestionar tus artículos, comentarios y más.</p>

        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-2">Artículos Recientes</h2>
            <ul class="list-disc pl-5">
                <li>Artículo 1 - <a href="#" class="text-blue-500 hover:underline">Editar</a></li>
                <li>Artículo 2 - <a href="#" class="text-blue-500 hover:underline">Editar</a></li>
                <li>Artículo 3 - <a href="#" class="text-blue-500 hover:underline">Editar</a></li>
            </ul>
        </section>

        <section>
            <h2 class="text-xl font-semibold mb-2">Comentarios Pendientes</h2>
            <ul class="list-disc pl-5">
                <li>Comentario 1 - <a href="#" class="text-blue-500 hover:underline">Responder</a></li>
                <li>Comentario 2 - <a href="#" class="text-blue-500 hover:underline">Responder</a></li>
            </ul>
        </section>
    </main>

    <?php include '../includes/footer.php'; ?>

</body>
</html>