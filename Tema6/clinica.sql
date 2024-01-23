
CREATE DATABASE IF NOT EXISTS Clinica;


USE Clinica;

--  tabla Usuario
CREATE TABLE IF NOT EXISTS cita (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Especialista VARCHAR(25) NOT NULL,
    motivo VARCHAR(200) NOT NULL,
    fecha DATE NOT NULL,
    paciente VARCHAR(15) NOT NULL,
    FOREIGN KEY (paciente) REFERENCES Usuario (codUsuario),
    Activo BOOLEAN NOT NULL DEFAULT true
);






-- Assuming 'user123' exists in Usuario table
INSERT INTO cita (Especialista, motivo, fecha, paciente, Activo)
VALUES ('Dr. Smith', 'Consulta general', '2024-01-20', 'user1', true);

INSERT INTO cita (Especialista, motivo, fecha, paciente, Activo)
VALUES ('Dr. Smith', 'Consulta general', '2024-01-20', 'georgi', true);
