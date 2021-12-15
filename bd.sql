-- DROP DATABASE IF EXISTS ventas;


CREATE DATABASE IF NOT EXISTS ventas;
USE ventas;

CREATE TABLE tipo_usuario(
    id int,
    tipo varchar(20),
    PRIMARY KEY(id)
);
INSERT INTO tipo_usuario VALUES (1, 'root');
INSERT INTO tipo_usuario VALUES (2, 'usuario');

CREATE TABLE usuario(
    id int not null AUTO_INCREMENT,
	nombre varchar(100) not null,
	correo varchar(180) not null,
	p2 varchar(250) not null,
	id_fk int not null,
	PRIMARY KEY(id),
	FOREIGN KEY(id_fk) REFERENCES tipo_usuario(id)
);

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


select pr.descripcion, p.cantidad,v.fecha, v.total  from ventas v
 inner join productos_vendidos p on v.id = p.id_venta 
inner join productos pr on v.id=pr.id;

select v.fecha, p.descripcion, pv.cantidad
from ventas v inner join productos p  on v.id = p.id
inner join productos_vendidos pv on v.id = pv.id_venta;
