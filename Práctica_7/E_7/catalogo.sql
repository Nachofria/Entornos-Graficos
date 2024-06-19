CREATE TABLE compras.catalogo (
    id INT  PRIMARY KEY AUTO_INCREMENT,
    producto VARCHAR(100) NOT NULL,
    precio DECIMAL(9,2) NOT NULL
);
