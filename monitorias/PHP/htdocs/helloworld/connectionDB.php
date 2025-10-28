<?php
// Cargar variables del archivo .env
$env = parse_ini_file(__DIR__ . '/../.env');

// Extraer las variables
$servername = $env['DB_HOST'];
$username   = $env['DB_USER'];
$password   = $env['DB_PASS'];
$database   = $env['DB_NAME'];

// Conexión con MySQL
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
  die("Error en la conexión: " . $conn->connect_error);
}

echo "Conexión exitosa a la base de datos!";
?>
