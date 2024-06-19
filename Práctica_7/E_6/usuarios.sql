
CREATE TABLE base2.usuarios (
  id int(11) NOT NULL,
  nombre varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  contrasena varchar(255) NOT NULL,
  fecha_registro timestamp NOT NULL DEFAULT current_timestamp
);
