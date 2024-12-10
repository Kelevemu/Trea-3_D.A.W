CREATE DATABASE tienda;
USE tienda;

CREATE TABLE categorias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL
);

INSERT INTO categorias (nombre) VALUES 
('Electrónica'), 
('Ropa'), 
('Hogar');

CREATE TABLE productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  categoria_id INT NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);

INSERT INTO productos (categoria_id, nombre, precio) VALUES 
(1, 'Televisor LED', 350.00),
(1, 'Smartphone', 200.00),
(2, 'Camiseta Algodón', 15.00),
(3, 'Cafetera', 45.50);
