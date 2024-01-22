 

CREATE DATABASE dbproyecto;


USE dbproyecto;



CREATE TABLE `tiposproductos` (
  `Idtip` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Idtip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `productos` (
  `Idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Cantidad` int(10) DEFAULT NULL,
  `Idtip` int(11) DEFAULT NULL,
  PRIMARY KEY (`Idproducto`),
  INDEX `fk_productos_idtip` (`Idtip`),
  FOREIGN KEY (`Idtip`) REFERENCES `tiposproductos` (`Idtip`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `tiposproductos` (`NombreTipo`) VALUES
('Motos'),
('Accesorios para Motos'),
('Ropa para Motociclistas'),
('Repuestos y Componentes'),
('hola'),
('gsdf');



INSERT INTO Productos (Idproducto, Nombre, Precio, Cantidad, Idtip) VALUES
(1, 'Motocicleta Sport 200cc', 4999.99, 10, 1),
(2, 'Casco Integral', 129.99, 50, 2),
(3, 'Chaqueta de Cuero para Motociclista', 199.99, 30, 3),
(4, 'Frenos de Disco para Moto', 49.99, 100, 4),
(5, 'Aceite para Motor de Moto', 9.99, 200, 4),
(6, 'Guantes de Motociclista', 29.99, 50, 3),
(7, 'Escape Deportivo para Moto', 149.99, 20, 4),
(8, 'Botas para Motocross', 89.99, 40, 3),
(9, 'Llanta Trasera para Moto Deportiva', 79.99, 25, 4),
(10, 'Kit de Herramientas para Moto', 39.99, 15, 2);
