
CREATE DATABASE IF NOT EXISTS instituto_db;
USE instituto_db;

CREATE TABLE IF NOT EXISTS provincias(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    provincia VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS localidades(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    localidad VARCHAR(50) UNIQUE NOT NULL
);
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
    id_localidad INTEGER NOT NULL,
    id_provincia INTEGER NOT NULL,
    CONSTRAINT FK_DEPARTAMENTOS FOREIGN KEY (id_departamento) REFERENCES departamentos(id),
    CONSTRAINT FK_PROVINCIAS FOREIGN KEY (id_provincia) REFERENCES provincias(id),
    CONSTRAINT FK_LOCALIDADES FOREIGN KEY (id_localidad) REFERENCES localidades(id)
);

CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

INSERT INTO provincias (provincia) VALUES('Buenos Aires');
INSERT INTO localidades (localidad) VALUES('Alejandro korn');
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

INSERT INTO empleados (dni, nombre, apellido, direccion, telefono, id_departamento, id_localidad, id_provincia) VALUES
(12345678, 'Juan', 'Pereira', 'Calle Falsa 123', 12345678, 1, 1, 1),
(12345679, 'María', 'González', 'Av. Siempre Viva 742', 98765432, 2, 1, 1);

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
l.localidad as 'Localidad',
p.provincia as 'Provincia'
FROM empleados e
INNER JOIN departamentos d
ON e.id_departamento = d.id
INNER JOIN provincias p
ON e.id_provincia = p.id
INNER JOIN localidades l
ON e.id_localidad = l.id
ORDER BY e.id;

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

