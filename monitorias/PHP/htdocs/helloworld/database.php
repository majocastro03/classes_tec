<?php
// Incluye la clase base Model del ORM que será usada posteriormente
require_once __DIR__ . '/core/Model.php';

// Carga las variables de entorno desde el archivo .env
// Este archivo contiene configuraciones sensibles como credenciales de la base de datos
$env = parse_ini_file(__DIR__ . '/../.env');

// Extrae los valores necesarios para la conexión a la base de datos
// Estas claves deben coincidir con las definidas en el archivo .env
$host = $env['DB_HOST']; // Dirección del servidor de la base de datos (ej. localhost)
$user = $env['DB_USER']; // Nombre de usuario para acceder a la base de datos
$pass = $env['DB_PASS']; // Contraseña del usuario de la base de datos
$db   = $env['DB_NAME']; // Nombre de la base de datos a la que se conectará

try {
    // Construye el Data Source Name (DSN) para MySQL
    // Especifica el host, el nombre de la base de datos y el conjunto de caracteres
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";

    // Crea una nueva instancia de PDO (PHP Data Objects)
    // PDO es una interfaz unificada para acceder a bases de datos en PHP
    $pdo = new PDO($dsn, $user, $pass, [
        // Configura PDO para que lance excepciones en caso de error (mejor manejo de errores)
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // Establece que los resultados de las consultas se devuelvan como arrays asociativos
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    // Asigna la conexión PDO al ORM (Modelo)
    // Esto permite que todas las clases que heredan de Model usen esta conexión global
    Model::setConnection($pdo);

    // Mensaje de confirmación en caso de conexión exitosa (útil en entornos de desarrollo)
    echo "Conexión exitosa a la base de datos!\n";

} catch (PDOException $e) {
    // Si ocurre un error en la conexión (credenciales incorrectas, servidor caído, etc.),
    // se captura la excepción y se termina la ejecución mostrando el mensaje de error
    die("Error de conexión: " . $e->getMessage());
}
?>