CREATE DATABASE juegodetexto;

CREATE TABLE juegodetexto.jugador
(
  id_jugador BIGINT(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nombre_jugador VARCHAR(100),
  habitacion_jugador VARCHAR(100)
);

CREATE TABLE juegodetexto.habitaciones
(
  id_habitacion BIGINT(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nombre_habitacion VARCHAR(100),
  descripcion_habitacion VARCHAR(100),
  norte VARCHAR(100),
  sur VARCHAR(100),
  este VARCHAR(100),
  oeste VARCHAR(100)
);