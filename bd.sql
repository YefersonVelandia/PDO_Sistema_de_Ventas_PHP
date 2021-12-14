DROP DATABASE IF EXISTS ventas;
CREATE DATABASE IF NOT EXISTS ventas;
USE ventas;
CREATE TABLE productos(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	codigo VARCHAR(255) NOT NULL,
	descripcion VARCHAR(255) NOT NULL,
	precioVenta int NOT NULL,
	precioCompra int NOT NULL,
	existencia int NOT NULL,
	PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE ventas(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	fecha DATETIME NOT NULL,
	total int,
	PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE productos_vendidos(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_producto BIGINT UNSIGNED NOT NULL,
	cantidad BIGINT UNSIGNED NOT NULL,
	id_venta BIGINT UNSIGNED NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(id_producto) REFERENCES productos(id) ON DELETE CASCADE,
	FOREIGN KEY(id_venta) REFERENCES ventas(id) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

INSERT INTO productos(id, codigo, descripcion, precioVenta, precioCompra, existencia) 
VALUES
(1, '1', 'Galletas chokis', 15000, 1000, 100),
(2, '2', 'Mermelada de fresa', 2000, 1000, 100),
(3, '3', 'Aceite', 20000, 18000, 100),
(4, '4', 'Palomitas de maíz', 15000, 12000, 100),
(5, '5', 'Doritos', 8000, 5000, 100);
