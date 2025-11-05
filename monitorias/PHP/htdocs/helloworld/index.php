<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios ORM</title>
</head>
<body>
    <h1>Listado de Usuarios</h1>

    <?php
    // Incluye el archivo de conexión a la base de datos
    // Este archivo configura la conexión PDO y la registra en la clase Model
    require_once __DIR__ . '/database.php';

    // Incluye la clase de modelo específica para la entidad "Usuario"
    // La clase User hereda de Model y representa la tabla 'users' en la base de datos
    require_once __DIR__ . '/models/User.php';

    try {
        // Llama al método estático `all()` heredado de Model
        // Este método recupera todos los registros de la tabla asociada (ej. 'users')
        // y devuelve un array de instancias de la clase User
        $users = User::all();

        // Verifica si se encontraron usuarios
        if (!empty($users)) {
            // Muestra los usuarios en una lista desordenada
            echo "<ul>";
            foreach ($users as $user) {
                // Accede a las propiedades del modelo mediante los métodos mágicos __get()
                // Esto es posible gracias a la implementación en la clase Model
                echo "<li>{$user->id} - {$user->nombre} ({$user->email})</li>";
            }
            echo "</ul>";
        } else {
            // Mensaje informativo cuando no hay registros en la base de datos
            echo "<p>No hay usuarios registrados.</p>";
        }

    } catch (Exception $e) {
        // Captura cualquier excepción que ocurra durante la operación
        // (por ejemplo, error de conexión, tabla inexistente, etc.)
        // y muestra un mensaje de error amigable al usuario
        echo "<p>Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</p>";
    }
    ?>
</body>
</html>