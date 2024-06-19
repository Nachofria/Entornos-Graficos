CREATE TABLE ciudades.ciudad (
    id INT PRIMARY KEY AUTO_INCREMENT,
    ciudad VARCHAR(100) NOT NULL,
    pais VARCHAR(100) NOT NULL,
    habitantes INT NOT NULL,
    superficie FLOAT NOT NULL,
    tieneMetro TINYINT NOT NULL
);
