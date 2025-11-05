<?php

/**
 * Clase abstracta base para modelos de entidades (Active Record)
 * Proporciona funcionalidades comunes de acceso a base de datos:
 * - Crear, leer, actualizar y eliminar registros (CRUD)
 * - Manejo dinámico de atributos mediante métodos mágicos
 * - Compatibilidad con herencia para distintas tablas
 */
abstract class Model
{
    // Conexión compartida a la base de datos (instancia de PDO)
    // Se establece una vez desde fuera (ej. database.php) y se reutiliza en todos los modelos
    protected static PDO $conn;

    // Nombre de la tabla en la base de datos asociada a cada subclase
    // Cada clase que herede de Model debe definir este valor
    protected static string $table;

    // Almacena los datos (columnas) del registro actual como un array asociativo
    // Ej: ['id' => 1, 'nombre' => 'Juan', 'email' => 'juan@example.com']
    protected array $attributes = [];

    /**
     * Constructor del modelo
     * Recibe un array opcional con datos iniciales (ej. desde una consulta a la BD)
     */
    public function __construct(array $data = [])
    {
        $this->attributes = $data; // Inicializa los atributos del modelo con los datos proporcionados
    }

    /**
     * Método estático para inyectar la conexión PDO al modelo
     * Se llama una vez al inicio de la aplicación (normalmente desde database.php)
     */
    public static function setConnection(PDO $conn)
    {
        static::$conn = $conn; // Asigna la conexión compartida a la propiedad estática
    }

    /**
     * Método mágico para leer propiedades dinámicas
     * Permite acceder a los atributos como si fueran propiedades del objeto:
     * Ej: $usuario->nombre en lugar de $usuario->attributes['nombre']
     */
    public function __get($name)
    {
        return $this->attributes[$name] ?? null; // Devuelve el valor o null si no existe
    }

    /**
     * Método mágico para asignar propiedades dinámicas
     * Permite establecer valores directamente:
     * Ej: $usuario->nombre = 'Ana';
     */
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value; // Almacena el valor en el array de atributos
    }

    /**
     * Obtiene todos los registros de la tabla asociada
     * @return array Array de instancias del modelo (una por cada fila)
     */
    public static function all(): array
    {
        // Prepara y ejecuta una consulta SELECT * sobre la tabla del modelo
        $stmt = static::$conn->query("SELECT * FROM " . static::$table);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtiene todos los resultados como arrays asociativos

        // Convierte cada fila en una instancia del modelo actual (usa `static` para respetar la herencia)
        return array_map(fn($row) => new static($row), $rows);
    }

    /**
     * Busca un registro por su ID
     * @param mixed $id El valor del identificador único
     * @return static|null Devuelve una instancia del modelo si se encuentra, o null si no
     */
    public static function find($id): ?static
    {
        // Prepara una consulta parametrizada para evitar inyecciones SQL
        $stmt = static::$conn->prepare("SELECT * FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]); // Ejecuta la consulta con el ID proporcionado
        $data = $stmt->fetch(PDO::FETCH_ASSOC); // Obtiene una sola fila

        // Si hay datos, crea y devuelve una nueva instancia; si no, devuelve null
        return $data ? new static($data) : null;
    }

    /**
     * Guarda el modelo en la base de datos (INSERT o UPDATE)
     * - Si el modelo tiene un 'id', se actualiza (UPDATE)
     * - Si no tiene 'id', se inserta un nuevo registro (INSERT)
     * @return bool Verdadero si la operación fue exitosa, falso en caso contrario
     */
    public function save(): bool
    {
        if (isset($this->attributes['id'])) {
            // Caso: Actualización (UPDATE)
            $fields = array_keys($this->attributes); // Obtiene los nombres de las columnas
            // Genera una lista de asignaciones: "nombre = :nombre, email = :email"
            $updates = implode(', ', array_map(fn($f) => "$f = :$f", $fields));
            $sql = "UPDATE " . static::$table . " SET $updates WHERE id = :id";
        } else {
            // Caso: Inserción (INSERT)
            $fields = array_keys($this->attributes);
            $columns = implode(', ', $fields); // "nombre, email"
            $placeholders = implode(', ', array_map(fn($f) => ":$f", $fields)); // ":nombre, :email"
            $sql = "INSERT INTO " . static::$table . " ($columns) VALUES ($placeholders)";
        }

        // Prepara y ejecuta la consulta con los valores actuales del modelo
        $stmt = static::$conn->prepare($sql);
        $result = $stmt->execute($this->attributes);

        // Si es una inserción, asigna el ID generado automáticamente al modelo
        if (!isset($this->attributes['id'])) {
            $this->attributes['id'] = static::$conn->lastInsertId();
        }

        return $result; // Retorna el resultado de la operación (éxito o fallo)
    }

    /**
     * Elimina el registro actual de la base de datos
     * Solo funciona si el modelo tiene un ID asignado
     * @return bool Verdadero si se eliminó correctamente, falso si no hay ID o falla la operación
     */
    public function delete(): bool
    {
        // Si no hay ID, no se puede eliminar
        if (!isset($this->attributes['id'])) return false;

        // Prepara y ejecuta una consulta DELETE parametrizada
        $stmt = static::$conn->prepare("DELETE FROM " . static::$table . " WHERE id = :id");
        return $stmt->execute(['id' => $this->attributes['id']]);
    }
}