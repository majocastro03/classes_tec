USE test_php;

-- Tabla de productos
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  cantidad INT NOT NULL,
  fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (nombre, cantidad) VALUES
('Producto01', 53),
('Producto02', 67);

-- Tabla de usuarios
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE
);

INSERT INTO users (nombre, email) VALUES
('Juan Pérez', 'juan@example.com'),
('Ana Torres', 'ana@example.com'),
('Luis García', 'luis@example.com');

-- Tabla de ventas (relación intermedia)
CREATE TABLE IF NOT EXISTS sales (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  product_id INT NOT NULL,
  cantidad_vendida INT NOT NULL,
  fecha_venta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Datos de ejemplo
INSERT INTO sales (user_id, product_id, cantidad_vendida) VALUES
(1, 1, 2), 
(2, 2, 1), 
(3, 1, 5); 
