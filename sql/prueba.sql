CREATE DATABASE IF NOT EXISTS prueba;

USE prueba;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    telefono VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    contrasena VARCHAR(100) NOT NULL,
    contrasenaDos VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS respuesta (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    respuesta VARCHAR(100) NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE IF NOT EXISTS rol (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rol VARCHAR(100) NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE IF NOT EXISTS productosAnimales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagen VARCHAR(255) NOT NULL, 
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS productosAutos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagen VARCHAR(255) NOT NULL, 
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS productosHogar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagen VARCHAR(255) NOT NULL, 
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS pqrs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    correoDos VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    descripcion VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS compra (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    producto VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL,
    precio INT NOT NULL,
    cantidad VARCHAR(255) NOT NULL,
    total INT NOT NULL
);

CREATE TABLE IF NOT EXISTS domicilio (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    domicilio VARCHAR(100) NOT NULL,
    compra_id INT,
    FOREIGN KEY (compra_id) REFERENCES compra(id)
);

