<?php
// connect to the database
$host = 'mysql'; // Database host
$username = 'jose_galdamez'; // Database username
$password = 'password123456'; // Database password
$database = 'blogui'; // Database name

$conn = null;

try {
    $conn = @new mysqli($host, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        header('Location: /error-connection.php');
        exit();
    } 
} catch (mysqli_sql_exception $e) {
    // If there is an error connecting to the database, redirect to the error page
    error_log("Connection failed: " . $e->getMessage());
    // Redirect to error connection page
    header('Location: /error-connection.php');
    exit();
}
?>