-- Creación de la base de datos
CREATE DATABASE IF NOT EXISTS instituto_db;
USE instituto_db;

-- Creación de la tabla empleados
CREATE TABLE IF NOT EXISTS empleados (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    dni INT(8) NOT NULL UNIQUE,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    direccion VARCHAR(255),
    telefono INT(12),
    departamento VARCHAR(50),
    localidad VARCHAR(100)
);

-- Creación de la tabla usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

-- Opcional: Insertar algunos datos de ejemplo
INSERT INTO empleados (dni, nombre, apellido, direccion, telefono, departamento, localidad) VALUES
(12345678, 'Juan', 'Pereira', 'Calle Falsa 123', 12345678, 'Ventas', 'Buenos Aires'),
(87654321, 'María', 'González', 'Av. Siempre Viva 742', 98765432, 'Marketing', 'Córdoba');

INSERT INTO usuarios (username, password, email) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@empresa.com');

-- Procedimiento almacenado para buscar empleados por DNI, nombre o apellido
DELIMITER //

CREATE PROCEDURE BuscarEmpleadosPorDNI_nombre_apellido(IN parametro_busqueda VARCHAR(255))
BEGIN
    SELECT *
    FROM empleados
    WHERE dni LIKE CONCAT('%', parametro_busqueda, '%')
    OR nombre LIKE CONCAT('%', parametro_busqueda, '%')
    OR apellido LIKE CONCAT('%', parametro_busqueda, '%');
END //

DELIMITER ;
