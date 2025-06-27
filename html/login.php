<?php
session_start();

if (isset($_SESSION['user'])) {
    return header('Location: /admin/dashboard.php');
}

include_once './server/connection.php';

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

        <form class="space-y-6">
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-2">Correo electrónico</label>
                <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-semibold mb-2">Contraseña</label>
                <input type="password" id="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>
            <button type="submit" class="w-full py-3 bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white font-bold rounded-full shadow-lg hover:scale-102 transition text-lg cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed disabled:bg-gray-300" id="btn-submit">
                Entrar
            </button>
        </form>

        <div id="error-message" class="mt-8 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 hidden" role="alert">
        </div>

        <div class="text-center mt-6">
            <a href="register.php" class="text-blue-600 hover:underline font-semibold">¿No tienes cuenta? Regístrate</a>
        </div>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío del formulario para manejarlo con JavaScript

            document.getElementById('btn-submit').disabled = true; // Deshabilita el botón de envío
            document.getElementById('btn-submit').textContent = 'Cargando...'; // Cambia el texto del botón
            document.getElementById('error-message').classList.add('hidden'); // Oculta el mensaje de error

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Validar que los campos no estén vacíos
            if (!email || !password) {
                const errorMessage = document.getElementById('error-message');
                errorMessage.textContent = 'Por favor, completa todos los campos.';
                errorMessage.classList.remove('hidden');
                document.getElementById('btn-submit').disabled = false; // Habilita el botón de envío
                document.getElementById('btn-submit').textContent = 'Entrar'; // Restablece el texto del botón
                return;
            }

             const formData = new FormData();
            formData.append('email', email);
            formData.append('password', password);

            // Aquí podrías agregar lógica adicional para enviar los datos al servidor
            // Por ejemplo, usando fetch o XMLHttpRequest para enviar una solicitud POST
            fetch('./server/login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {

                if (data.success) {
                    // Si el inicio de sesión es exitoso, redirigir al dashboard
                    window.location.href = '/admin/dashboard.php';
                } else {
                    // Si hay un error, mostrarlo
                    const errorMessage = document.getElementById('error-message');
                    errorMessage.textContent = data.error || 'Error al iniciar sesión. Por favor, inténtalo de nuevo.';
                    errorMessage.classList.remove('hidden');
                    document.getElementById('btn-submit').disabled = false; // Habilita el botón de envío
                    document.getElementById('btn-submit').textContent = 'Entrar'; // Rest
                } 
                
            })
            .catch(error => {
                console.log("Error occurred while fetching data:");
                console.error('Error:', error);
                const errorMessage = document.getElementById('error-message');
                errorMessage.textContent = 'Error al conectar con el servidor. Por favor, inténtalo de nuevo más tarde.';
                errorMessage.classList.remove('hidden');
                document.getElementById('btn-submit').disabled = false; // Habilita el botón de envío
                document.getElementById('btn-submit').textContent = 'Entrar'; // Rest
            });
        });
    </script>

</body>
</html>