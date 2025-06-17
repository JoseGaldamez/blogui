<?php
session_start();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Datos dummy para ejemplo
    $usuario = $_POST['usuario'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    if (!$usuario || !$email || !$password || !$confirm) {
        $error = 'Por favor, completa todos los campos.';
    } elseif ($password !== $confirm) {
        $error = 'Las contraseñas no coinciden.';
    } else {
        // Aquí iría la lógica real de registro (guardar en BD, etc)
        $success = '¡Registro exitoso! Ahora puedes iniciar sesión.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gradient-to-br from-blue-800 via-purple-900 to-pink-900 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Crear cuenta</h1>
        <?php if ($error): ?>
            <div class="mb-4 text-red-600 text-center font-semibold"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="mb-4 text-green-600 text-center font-semibold"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        <form method="POST" class="space-y-6">
            <div>
                <label for="usuario" class="block text-gray-700 font-semibold mb-2">Usuario</label>
                <input type="text" id="usuario" name="usuario" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" value="<?= isset($_POST['usuario']) ? htmlspecialchars($_POST['usuario']) : '' ?>">
            </div>
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-2">Correo electrónico</label>
                <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-semibold mb-2">Contraseña</label>
                <input type="password" id="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
            </div>
            <div>
                <label for="confirm" class="block text-gray-700 font-semibold mb-2">Confirmar contraseña</label>
                <input type="password" id="confirm" name="confirm" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
            </div>
            <button type="submit" class="w-full py-3 bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white font-bold rounded-full shadow-lg hover:scale-105 transition text-lg">
                Registrarme
            </button>
        </form>
        <div class="text-center mt-6">
            <a href="login.php" class="text-blue-600 hover:underline font-semibold">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </div>
</body>
</html>