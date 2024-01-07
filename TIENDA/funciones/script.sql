
CREATE DATABASE IF NOT EXISTS Tienda;


USE Tienda;

--  tabla Usuario
CREATE TABLE IF NOT EXISTS Usuario (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(255),
    Contraseña VARCHAR(255),
    Email VARCHAR(255),
    FechaNacimiento DATE,
    Perfil ENUM('Administrador', 'Moderador', 'Cliente') NOT NULL,
    Borrado BOOLEAN NOT NULL DEFAULT FALSE
);


INSERT INTO Usuario (Nombre, Contraseña, Email, FechaNacimiento, Perfil) VALUES
    ('AdminUser', 'adminpass', 'admin@example.com', '1990-01-01', 'Administrador'),
    ('ModUser', 'modpass', 'moderator@example.com', '1995-05-05', 'Moderador'),
    ('NormalUser', 'userpass', 'user@example.com', '2000-10-10', 'Cliente');


CREATE TABLE IF NOT EXISTS Producto (
    Codigo INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(255),
    CantidadStock INT,
    Imagen VARCHAR(255),
    Borrado BOOLEAN NOT NULL DEFAULT FALSE
);

INSERT INTO Producto (Nombre, CantidadStock, Imagen) VALUES
    ('Producto1', 50, 'producto1.webp'),
    ('Producto2', 30, 'producto2.webp'),
    ('Producto3', 20, 'producto3.jpg');


CREATE TABLE IF NOT EXISTS PedidoCompra (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    UsuarioId INT,
    FechaCompra TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CodProducto INT,
    Cantidad INT,
    PrecioTotal DECIMAL(10, 2),
    FOREIGN KEY (UsuarioId) REFERENCES Usuario(Id),
    FOREIGN KEY (CodProducto) REFERENCES Producto(Codigo)
);


CREATE TABLE IF NOT EXISTS Albaran (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    FechaAlbaran TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CodProducto INT,
    Cantidad INT,
    UsuarioId INT,
    FOREIGN KEY (UsuarioId) REFERENCES Usuario(Id),
    FOREIGN KEY (CodProducto) REFERENCES Producto(Codigo)
);
