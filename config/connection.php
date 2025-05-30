<?php

// connect to the database
$host = 'localhost'; // Database host
$username = 'jose_galdamez'; // Database username
$password = 'password123456'; // Database password
$database = 'blogui'; // Database name
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>