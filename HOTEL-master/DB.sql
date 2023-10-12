CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(255) NOT NULL,
    apellidos VARCHAR(255) NOT NULL,
    DNI VARCHAR(20) NOT NULL,
    Tipo_habitacion VARCHAR(50) NOT NULL,
    Fecha_reserva DATE NOT NULL,
    hora_ingreso TIME NOT NULL,
    hora_salida TIME NOT NULL,
    celular VARCHAR(20) NOT NULL
);
INSERT INTO reservas (nombres, apellidos, DNI, Tipo_habitacion, Fecha_reserva, hora_ingreso, hora_salida, celular) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?);
UPDATE reservas
SET nombres = ?, apellidos = ?, DNI = ?, Tipo_habitacion = ?, Fecha_reserva = ?, hora_ingreso = ?, hora_salida = ?, celular = ?
WHERE id = ?;
DELETE FROM reservas
WHERE id = ?;
