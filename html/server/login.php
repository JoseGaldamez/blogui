<?php

require_once __DIR__ . '/connection.php'; 

try {
    session_start();
    if (!$conn) {
        header('Location: ./error-connection.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        // Si no es POST, redirigir o mostrar un error
        header('Location: ./error.php?msg=Metodo_no_permitido'); // Puedes crear un error.php genérico
        exit();
    }

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? ''; // La contraseña no se sanea con filter_input

        // Validar y procesar los datos de inicio de sesión
        if (empty($email) || empty($password)) {
            echo json_encode(['error' => 'Por favor, completa todos los campos.']);
            exit;
        }
    
        // Aquí iría la lógica para verificar las credenciales del usuario
        // Por ejemplo, consultar la base de datos para encontrar al usuario
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Si las credenciales son válidas
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $email; // Guardar información del usuario en la sesión
            echo "{ \"success\": true }"; // Respuesta exitosa
        } else {
            echo "{ \"error\": \"Credenciales incorrectas.\"}"; // Respuesta de error
        }
        exit;
    
    
    $conn->close();
    echo "{ \"error\": \"Método no permitido.\" }"; // Respuesta si no es POST
    exit;
} catch (\Throwable $th) {
    echo "Error inesperado";
}


?>