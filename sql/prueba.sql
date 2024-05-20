CREATE DATABASE IF NOT EXISTS prueba;

USE prueba;

-- Tabalas del usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    telefono VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    contrasena VARCHAR(100) NOT NULL,
    contrasenaDos VARCHAR(100) NOT NULL
);

ALTER TABLE usuarios AUTO_INCREMENT = 1;

CREATE TABLE IF NOT EXISTS respuesta (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    respuesta VARCHAR(100) NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

ALTER TABLE respuesta AUTO_INCREMENT = 1;

CREATE TABLE IF NOT EXISTS rol (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rol VARCHAR(100) NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

ALTER TABLE rol AUTO_INCREMENT = 1;

-- Tabalas del administrador 
CREATE TABLE IF NOT EXISTS productosAnimales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagen VARCHAR(255) NOT NULL, 
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL
    precio DECIMAL(10, 2) NOT NULL,
);
 ALTER TABLE productosAnimales AUTO_INCREMENT = 1;

 -- Tabalas del administrador 
CREATE TABLE IF NOT EXISTS productosAutos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagen VARCHAR(255) NOT NULL, 
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL
    precio DECIMAL(10, 2) NOT NULL,
);
 ALTER TABLE productosAutos AUTO_INCREMENT = 1;

 -- Tabalas del administrador 
CREATE TABLE IF NOT EXISTS productosHogar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagen VARCHAR(255) NOT NULL, 
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL
    precio DECIMAL(10, 2) NOT NULL,
);
 ALTER TABLE productosHogar AUTO_INCREMENT = 1;