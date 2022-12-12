#crear la base de datos del restaurante
CREATE DATABASE IF NOT EXISTS restaurante_db;
#abrir la base de datos para modificarla (para poner cosas dentro de ella)
USE restaurante_db;
#crear tabla mesa
CREATE TABLE IF NOT EXISTS mesa
(
    mesa_nombre VARCHAR(2) NOT NULL,
    mesa_capacidad ENUM('2','4','8') NOT NULL COMMENT'Indica la capacidad de personas de cada mesa',
    mesa_disponible ENUM('D','ND') NOT NULL COMMENT'Indica si la mesa esta ocupada',
    PRIMARY KEY (mesa_nombre), # Llave natural
    INDEX (mesa_capacidad),
    UNIQUE(mesa_nombre) # Nombre de la mesa unica por que sera un numero limitado para cierto espacio
);
#crear tabla mesero
CREATE TABLE IF NOT EXISTS mesero
(
	mesero_id INT NOT NULL AUTO_INCREMENT,
    mesero_nom VARCHAR(60)NOT NULL,
    mesero_ap_pat VARCHAR(25) NOT NULL,
    mesero_ap_mat VARCHAR(25) NOT NULL,
    mesero_telefono VARCHAR(10) NOT NULL,
    mesero_correo VARCHAR(25) NOT NULL,
    mesero_disponible ENUM('D','ND') NOT NULL COMMENT'Indica los meseros disponibles para atender a los clientes',
    PRIMARY KEY (mesero_id), #Llave sustituta para meter o despedir empleados
    INDEX(mesero_correo), 
    INDEX(mesero_telefono),
    UNIQUE(mesero_correo) # Correo no se puede repetir ya que debe ser personal
);
#crear tabla comida_bebida
CREATE TABLE IF NOT EXISTS comida_bebida
(
	com_beb_id INT NOT NULL AUTO_INCREMENT,
    com_beb_producto VARCHAR(50) NOT NULL,
    com_beb_categoria ENUM('Bebida','Comida','Postre') NOT NULL COMMENT'Indica la categoria del producto',
    com_beb_precio FLOAT NOT NULL,
    com_beb_disponible ENUM('D','ND') NOT NULL COMMENT'Indica si el producto esta disponle',
    PRIMARY KEY (com_beb_id), # Llave sustituta por si se necesita borrar del menu y meter nuevos productos
    INDEX(com_beb_producto),
    INDEX(com_beb_categoria),
    UNIQUE(com_beb_producto,com_beb_categoria) #no se puede repetir el producto y categoria en un restaurante
);
#crear tabla clientes
CREATE TABLE IF NOT EXISTS cliente
(
	cli_id INT NOT NULL AUTO_INCREMENT,
    cli_nombre VARCHAR(30) NOT NULL,
    cli_ap_pat VARCHAR(20),
    cli_ap_mat VARCHAR(20),
    cli_num_personas INT NOT NULL,
    cli_fecha DATE NOT NULL,
    cli_pago ENUM('s','n') NOT NULL COMMENT'Indica si el cliente pago la cuenta',
    cli_mesa_id VARCHAR(2),
    cli_mesero_id INT,
    PRIMARY KEY (cli_id), #llave sustitura ya que este registro sera grande aun que se repita el cliente
    INDEX (cli_nombre),
	CONSTRAINT fk_cliente_mesa
		FOREIGN KEY (cli_mesa_id)
		REFERENCES mesa (mesa_nombre)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	CONSTRAINT fk_cliente_mesero
		FOREIGN KEY (cli_mesero_id)
		REFERENCES mesero (mesero_id)
		ON DELETE CASCADE
		ON UPDATE CASCADE
);
#crear tabla detalle prestamo
CREATE TABLE IF NOT EXISTS orden
(
	ord_id INT NOT NULL AUTO_INCREMENT,
	ord_cliente_id INT,
	ord_com_id INT,
	PRIMARY KEY(ord_id), #Llave sustita para los registros de las ordenes
    INDEX (ord_cliente_id),
	CONSTRAINT fk_orden_cliente
		FOREIGN KEY (ord_cliente_id)
		REFERENCES cliente (cli_id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	CONSTRAINT fk_oden_comida
		FOREIGN KEY (ord_com_id)
		REFERENCES comida_bebida (com_beb_id)
		ON DELETE CASCADE
		ON UPDATE CASCADE
);
/*
A)
SELECT m.mesero_id,m.mesero_nom ,c.cli_fecha, COUNT(*) AS ordenes_por_mesero
	FROM cliente AS c, mesero AS m 
	WHERE m.mesero_id = c.cli_mesero_id 
	AND c.cli_fecha = '2021-12-12'
    GROUP BY m.mesero_nom;
B)
SELECT COUNT(*) AS ordenes_por_mesa
	FROM cliente AS c, mesa AS m 
	WHERE m.mesa_nombre = c.cli_mesa_id 
	AND c.cli_fecha = '2021-12-12';
C)
SELECT SUM(com_beb_precio) AS tota_por_fecha 
        FROM cliente AS c, comida_bebida AS p, orden AS o
        WHERE o.ord_com_id = p.com_beb_id
        AND c.cli_id = o.ord_cliente_id
        AND c.cli_fecha = '2021-12-12';
*/
    
    
    