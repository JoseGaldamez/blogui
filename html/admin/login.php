<?php
session_start();

if (isset($_SESSION['user_id'])) {
    return header('Location: /admin/dashboard.php');
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Datos dummy
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    // Puedes cambiar estos valores por los que quieras
    if ($usuario === 'admin' && $password === '1234') {
        $_SESSION['user_id'] = 1;
        $_SESSION['username'] = $usuario;
        header('Location: /admin/dashboard.php');
        exit();
    } else {
        $error = 'Usuario o contraseña incorrectos.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gradient-to-br from-blue-800 via-purple-900 to-pink-900 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Iniciar sesión</h1>
        <?php if ($error): ?>
            <div class="mb-4 text-red-600 text-center font-semibold"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="POST" class="space-y-6">
            <div>
                <label for="usuario" class="block text-gray-700 font-semibold mb-2">Usuario</label>
                <input type="text" id="usuario" name="usuario" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-semibold mb-2">Contraseña</label>
                <input type="password" id="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>
            <button type="submit" class="w-full py-3 bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white font-bold rounded-full shadow-lg hover:scale-102 transition text-lg cursor-pointer">
                Entrar
            </button>
        </form>
        <div class="text-center mt-6">
            <a href="register.php" class="text-blue-600 hover:underline font-semibold">¿No tienes cuenta? Regístrate</a>
        </div>
    </div>
</body>
</html>