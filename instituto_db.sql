
CREATE DATABASE IF NOT EXISTS instituto_db;
USE instituto_db;

CREATE TABLE IF NOT EXISTS paises(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    pais VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS provincias(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    provincia VARCHAR(50) UNIQUE NOT NULL,
    id_pais INTEGER NOT NULL,
    CONSTRAINT FK_PROVINCIA_PAIS FOREIGN KEY (id_pais) REFERENCES paises (id)
);

CREATE TABLE IF NOT EXISTS localidades(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    localidad VARCHAR(50) UNIQUE NOT NULL,
    id_provincia INTEGER NOT NULL,
    CONSTRAINT FK_LOCALIDAD_PROVINCIA FOREIGN KEY (id_provincia) REFERENCES provincias (id)
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
    id_pais INTEGER NOT NULL,
    id_provincia INTEGER NOT NULL,
    id_localidad INTEGER NOT NULL,
    CONSTRAINT FK_DEPARTAMENTOS FOREIGN KEY (id_departamento) REFERENCES departamentos(id),
    CONSTRAINT FK_EMPLEADO_PAISES FOREIGN KEY (id_pais) REFERENCES paises (id),
    CONSTRAINT FK_EMPLEADO_PROVINCIAS FOREIGN KEY (id_provincia) REFERENCES provincias(id),
    CONSTRAINT FK_EMPLEADO_LOCALIDADES FOREIGN KEY (id_localidad) REFERENCES localidades(id)
);

CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);
INSERT INTO paises (pais) VALUES
('Argentina'),
('Brasil'),
('Chile'),
('Uruguay'),
('Paraguay');

-- Argentina (id_pais = 1)
INSERT INTO provincias (provincia, id_pais) VALUES
('Buenos Aires', 1),
('Córdoba', 1),
('Santa Fe', 1),
('Mendoza', 1);

-- Brasil (id_pais = 2)
INSERT INTO provincias (provincia, id_pais) VALUES
('São Paulo', 2),
('Rio de Janeiro', 2);

-- Chile (id_pais = 3)
INSERT INTO provincias (provincia, id_pais) VALUES
('Santiago', 3),
('Valparaíso', 3);

-- Uruguay (id_pais = 4)
INSERT INTO provincias (provincia, id_pais) VALUES
('Montevideo', 4),
('Canelones', 4);

-- Paraguay (id_pais = 5)
INSERT INTO provincias (provincia, id_pais) VALUES
('Asunción', 5),
('Central', 5);

-- Provincia: Buenos Aires (id_provincia = 1)
INSERT INTO localidades (localidad, id_provincia) VALUES
('Alejandro Korn', 1),
('La Plata', 1),
('Mar del Plata', 1);

-- Córdoba (id_provincia = 2)
INSERT INTO localidades (localidad, id_provincia) VALUES
('Córdoba Capital', 2),
('Villa María', 2);

-- Santa Fe (id_provincia = 3)
INSERT INTO localidades (localidad, id_provincia) VALUES
('Rosario', 3),
('Santa Fe Capital', 3);

-- Mendoza (id_provincia = 4)
INSERT INTO localidades (localidad, id_provincia) VALUES
('Mendoza Capital', 4),
('San Rafael', 4);

-- São Paulo (id_provincia = 5)
INSERT INTO localidades (localidad, id_provincia) VALUES
('Campinas', 5),
('Guarulhos', 5);

-- Rio de Janeiro (id_provincia = 6)
INSERT INTO localidades (localidad, id_provincia) VALUES
('Niterói', 6),
('Petrópolis', 6);

-- Santiago (id_provincia = 7)
INSERT INTO localidades (localidad, id_provincia) VALUES
('Santiago Centro', 7),
('Las Condes', 7);

-- Valparaíso (id_provincia = 8)
INSERT INTO localidades (localidad, id_provincia) VALUES
('Viña del Mar', 8),
('Quilpué', 8);

-- Montevideo (id_provincia = 9)
INSERT INTO localidades (localidad, id_provincia) VALUES
('Montevideo', 9);

-- Canelones (id_provincia = 10)
INSERT INTO localidades (localidad, id_provincia) VALUES
('Las Piedras', 10),
('Pando', 10);

-- Asunción (id_provincia = 11)
INSERT INTO localidades (localidad, id_provincia) VALUES
('Asunción', 11);

-- Central (id_provincia = 12)
INSERT INTO localidades (localidad, id_provincia) VALUES
('Luque', 12),
('San Lorenzo', 12);

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

INSERT INTO empleados (dni, nombre, apellido, direccion, telefono, id_departamento, id_pais, id_provincia, id_localidad) VALUES
(12345678, 'Juan', 'Pereira', 'Calle Falsa 123', 12345678, 1, 1, 1,1),
(12345679, 'María', 'González', 'Av. Siempre Viva 742', 98765432, 2, 1, 1, 1);

INSERT INTO usuarios (username, password, email) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@empresa.com');

-- Vista para seleccionar todos los datos de la tabla empleados y departamentos
CREATE OR REPLACE VIEW vista_empleados AS
SELECT
e.id            as 'Id Empleado',
e.dni           as 'Dni',
e.nombre        as 'Nombre',
e.apellido      as 'Apellido',
e.direccion     as 'Dirección',
e.telefono      as 'Telefono',
d.departamento  as 'Departamento',
l.localidad     as 'Localidad',
p.provincia     as 'Provincia',
pa.pais         as 'Pais'
FROM empleados e
INNER JOIN departamentos d  ON e.id_departamento = d.id
INNER JOIN paises pa        ON e.id_pais = pa.id
INNER JOIN provincias p     ON e.id_provincia = p.id
INNER JOIN localidades l    ON e.id_localidad = l.id
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

