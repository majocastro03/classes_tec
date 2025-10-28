<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Conexión y Hello World</title>
</head>

<body>
    <h1>
        <?php 
            echo 'Hello, World! Prueba de PHP<br><br>';

            // Incluimos la conexión a la base de datos
            include 'connectionDB.php'; 
            echo "<br>";

            // Ejemplo de variables y concatenación
            $x = 1;
            $y = "PHP";
            $txt = "Monitoria $y!";
            echo "$txt<br>";

            // Constantes en PHP
            define('LENGUAJE_PROGRAMACION', 'PHP');
            echo "Lenguaje: " . LENGUAJE_PROGRAMACION . "<br><br>";

            // Mostrar mensaje de conexión
            if ($conn->connect_error) {
                echo "Error en la conexión: " . $conn->connect_error;
            } else {
                echo "Conexión exitosa a la base de datos '$database'<br>";
            }

            // Ejemplo de consulta simple
            $sql = "SHOW TABLES";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                echo "<h3>Tablas en la base de datos:</h3>";
                while ($row = $result->fetch_array()) {
                    echo "- " . $row[0] . "<br>";
                }
            } else {
                echo "<p>No hay tablas aún.</p>";
            }

            // Cerrar conexión
            $conn->close();
        ?>
    </h1>
</body>

</html>
