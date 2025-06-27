<?php

require_once __DIR__ . '/connection.php'; 

if (!$conn) {
    header('Location: ./error-connection.php');
    exit();
}

// 2. Verificar si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Si no es POST, redirigir o mostrar un error
    header('Location: ./error.php?msg=Metodo_no_permitido'); // Puedes crear un error.php genérico
    exit();
}

// 3. Obtener y sanear los datos del POST
// Siempre sanea y valida los datos de entrada del usuario
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = $_POST['password'] ?? ''; // La contraseña no se sanea con FILTER_SANITIZE_FULL_SPECIAL_CHARS antes de hashearla


// Verificar si el correo electrónico ya está registrado
// Puedes hacer esto antes de insertar para evitar duplicados

$sql_check_email = "SELECT COUNT(*) FROM users WHERE email = ?";
$stmt_check_email = $conn->prepare($sql_check_email);
if ($stmt_check_email) {
    $stmt_check_email->bind_param("s", $email);
    $stmt_check_email->execute();
    $stmt_check_email->bind_result($count);
    $stmt_check_email->fetch();
    $stmt_check_email->close();

    if ($count > 0) {
        echo "{ \"error\": \"El correo electrónico ya está registrado.\" }";
        exit();
    }
} else {
    error_log("Error al preparar la consulta de verificación de email: " . $conn->error);
    echo "{ \"error\": \"Error interno del servidor.\" }";
    exit();
}

// 4. Validar los datos
// Puedes añadir más validaciones según tus necesidades (longitud mínima, etc.)
if (empty($username) || empty($email) || empty($password)) {
    echo "{ \"error\": \"Todos los campos son obligatorios.\" }";
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "{ \"error\": \"Email inválido.\" }";
    exit();
}

// 5. Hashear la contraseña
// ¡IMPORTANTE! NUNCA guardes contraseñas en texto plano.
// password_hash() usa un algoritmo fuerte (por defecto bcrypt) y añade un salt aleatorio.
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// 6. Preparar y ejecutar la consulta SQL para insertar el usuario
// Usar sentencias preparadas para prevenir inyección SQL
$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

// Preparar la sentencia
if ($stmt = $conn->prepare($sql)) {
    // 'sss' indica que los tres parámetros son de tipo string
    $stmt->bind_param("sss", $username, $email, $hashed_password);
    
    try {
        // Ejecutar la sentencia
        if ($stmt->execute()) {
        // Inserción exitosa
        echo "{ \"success\": \"Usuario creado exitosamente.\" }";
        exit();
    } else {
        // Error al ejecutar la consulta (ej. usuario o email duplicado si son UNIQUE)
        // Puedes verificar $stmt->errno para errores específicos de MySQL
        if ($stmt->errno == 1062) { // Error code 1062 es para entradas duplicadas en UNIQUE keys
            echo "{ \"error\": \"El usuario o el email ya están en uso.\" }";
        } else {
            error_log("Error al insertar usuario: " . $stmt->error);
            echo "{ \"error\": \"Error al crear usuario.\" }";
        }
        exit();
    }
    // Cerrar la sentencia preparada
    $stmt->close();

    } catch (\Throwable $th) {
        //throw $th;
        error_log("Error inesperado: " . $th->getMessage());
        echo "{ \"error\": \"Error inesperado.\" }";
    }
    

    

} else {
    // Error al preparar la consulta
    error_log("Error al preparar la consulta: " . $conn->error);
    echo "{ \"error\": \"Error interno del servidor.\" }";
    exit();
}

// 7. Cerrar la conexión a la base de datos (opcional, PHP lo hace al final del script)
// Si planeas hacer más operaciones, podrías mantenerla abierta.
// Pero si este script solo inserta, es buena práctica cerrarla.
$conn->close();

?>