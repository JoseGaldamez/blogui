<?php
session_start();
include_once './server/connection.php';
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
        
        <form onsubmit="" class="space-y-6">
            <div>
                <label for="username" class="block text-gray-700 font-semibold mb-2">Usuario</label>
                <input type="text" id="username" name="username" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>">
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
            <button type="submit" class="w-full py-3 bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white font-bold rounded-full shadow-lg hover:scale-105 transition text-lg cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed disabled:bg-gray-300" id="btn-submit">
                Registrarme
            </button>
        </form>

        <div id="alerta-error" class="mt-8 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 hidden" role="alert">
            
        </div>

        <div class="text-center mt-6">
            <a href="login.php" class="text-blue-600 hover:underline font-semibold">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </div>

    <script>
        // Aquí podrías agregar lógica adicional si es necesario
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío del formulario para manejarlo con JavaScript

            document.getElementById('alerta-error').classList.add('hidden');
            document.getElementById('btn-submit').disabled = true; // Deshabilitar el botón de envío


            // Obtener los valores de los campos del formulario
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirm = document.getElementById('confirm').value;

            // Validar que todos los campos estén completos
            if (!username || !email || !password || !confirm) {
                document.getElementById('alerta-error').innerHTML = 'Por favor, completa todos los campos.';
                document.getElementById('alerta-error').classList.remove('hidden');
                document.getElementById('btn-submit').disabled = false; // Habilitar el botón de envío
                return;
            }

            // Validar que las contraseñas coincidan
            if (password !== confirm) {
                document.getElementById('alerta-error').innerHTML = 'Las contraseñas no coinciden.';
                document.getElementById('alerta-error').classList.remove('hidden');
                document.getElementById('btn-submit').disabled = false; // Habilitar el botón de envío
                return;
            }

            // Si todo es válido, enviar los datos al servidor
            const formData = new FormData();
            formData.append('username', username);
            formData.append('email', email);
            formData.append('password', password);

            fetch('./server/register-user.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log('Response from server:', data);
                const jsonData = JSON.parse(data);

                if (jsonData["error"] != null){
                    document.getElementById('alerta-error').innerHTML = jsonData["error"];
                    document.getElementById('alerta-error').classList.remove('hidden');
                    document.getElementById('btn-submit').disabled = false; // Habilitar el botón de envío
                    return;
                }

                if (jsonData["success"]) {
                    // Redirigir o mostrar un mensaje de éxito
                    window.location.href = 'login.php';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>

</body>
</html>