
CREATE DATABASE IF NOT EXISTS instituto_db;
USE instituto_db;

CREATE TABLE IF NOT EXISTS departamentos (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    departamento VARCHAR(20) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS empleados (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    dni VARCHAR(8) NOT NULL UNIQUE,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    telefono VARCHAR(12) NOT NULL,
    id_departamento INTEGER NOT NULL,
    localidad VARCHAR(100) NOT NULL,
    provincia VARCHAR(100) NOT NULL,
    CONSTRAINT FK_DEPARTAMENTOS FOREIGN KEY (id_departamento) REFERENCES departamentos(id)
);

CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

INSERT INTO departamentos (departamento)
VALUES
('Ventas'),
('Produccion'),
('Marketing'),
('Finanzas'),
('RRHH'),
('Sistemas'),
('Administracion'),
('Gerencia'),
('Vigilancia');

INSERT INTO empleados (dni, nombre, apellido, direccion, telefono, id_departamento, localidad, provincia) VALUES
(12345678, 'Juan', 'Pereira', 'Calle Falsa 123', 12345678, 1, 'San Vicente', 'Buenos Aires'),
(12345679, 'María', 'González', 'Av. Siempre Viva 742', 98765432, 2, 'San Vicente', 'Córdoba');

INSERT INTO usuarios (username, password, email) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@empresa.com');
-- Vista para seleccionar todos los datos de la tabla empleados y departamentos
CREATE VIEW vista_empleados AS
SELECT
e.id as 'Id Empleado',
e.dni as 'Dni',
e.nombre as 'Nombre',
e.apellido as 'Apellido',
e.direccion as 'Dirección',
e.telefono as 'Telefono',
d.departamento as 'Departamento',
e.localidad as 'Localidad',
e.provincia as 'Provincia'
FROM empleados e
INNER JOIN departamentos d
ON e.id_departamento = d.id
ORDER BY e.id_departamento;

DELIMITER //

CREATE PROCEDURE BuscarEmpleadosPorDNI_nombre_apellido(IN parametro_busqueda VARCHAR(255))
BEGIN
    SELECT
*
    FROM vista_empleados
    WHERE Dni LIKE CONCAT('%', parametro_busqueda, '%')
    OR Nombre LIKE CONCAT('%', parametro_busqueda, '%')
    OR Apellido LIKE CONCAT('%', parametro_busqueda, '%');
END //

DELIMITER ;

