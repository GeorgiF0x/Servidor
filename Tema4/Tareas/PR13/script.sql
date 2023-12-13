-- Crear la base de datos
CREATE DATABASE GYM;
\c GYM;

-- Crear la tabla 'ejercicios'
CREATE TABLE ejercicios (
    id SERIAL PRIMARY KEY,
    ejercicio VARCHAR(255) NOT NULL,
    repeticiones INT,
    series INT
);

-- Insertar registros en la tabla 'ejercicios'
INSERT INTO ejercicios (ejercicio, repeticiones, series) VALUES
('Flexiones', 15, 3),
('Sentadillas', 20, 4),
('Plancha', 60, 2),
('Levantamiento de pesas', 12, 3),
('Abdominales', 30, 4),
('Burpees', 10, 3);