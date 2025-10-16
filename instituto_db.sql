-- Creación de la base de datos
CREATE DATABASE IF NOT EXISTS instituto_db;
USE instituto_db;

-- Creación de la tabla
CREATE TABLE IF NOT EXISTS alumnos (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    dni INT(8) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    telefono INT(12)
);

-- Opcional: Insertar algunos datos de ejemplo
INSERT INTO alumnos (dni, nombre, apellido, telefono) VALUES
(12345678, 'Juan', 'Pérez', 12345678),
(87654321, 'María', 'González', 98765432);
