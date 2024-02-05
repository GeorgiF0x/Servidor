
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
    ('Admingeorgi', 'adminpass', 'admin@example.com', '1990-01-01', 'Administrador'),
    ('Modgeorgi', 'modpass', 'moderator@example.com', '1995-05-05', 'Moderador'),
    ('georgi', 'userpass', 'user@example.com', '2000-10-10', 'Cliente');


        CREATE TABLE IF NOT EXISTS Producto (
            Codigo INT AUTO_INCREMENT PRIMARY KEY,
            Nombre VARCHAR(255),
            Descripcion TEXT,
            CantidadStock INT,
            Precio DECIMAL(10, 2),
            Imagen VARCHAR(255),
            Borrado BOOLEAN NOT NULL DEFAULT FALSE
        );

INSERT INTO Producto (Nombre, Descripcion, CantidadStock, Precio, Imagen) VALUES
    ('Proteína Whey - Fresa', 'Proteína whey con sabor a batido de fresa', 50, 19.99, './webroot/Media/producto1.webp'),
    ('Proteína Whey - Chocolate Cacaolat', 'Proteína whey con sabor a chocolate cacaolat', 30, 29.99, './webroot/Media/producto2.webp '),
    ('Caseína', 'Suplemento de caseína para liberación lenta', 20, 39.99, './webroot/Media/producto3.jpg'),
    ('Proteína Whey - Chocolate Negro', 'Proteína whey con sabor a chocolate negro', 40, 24.99, './webroot/Media/producto4.jpg '),
    ('Proteína Iso Whey Zero', 'Proteína iso whey zero sin lactosa', 25, 34.99, './webroot/Media/producto5.jpg'),
    ('Mass Gainer', 'Suplemento de aumento de peso', 15, 49.99, './webroot/Media/producto6.jpg'),
    ('Proteína Whey Neutra', 'Proteína whey sin sabor añadido', 35, 22.99, './webroot/Media/producto7.webp'),
    ('Mass Gainer Vegano', 'Suplemento de aumento de peso vegano', 10, 54.99, './webroot/Media/producto8.png');


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
    Accion VARCHAR(10), -- Agrega el campo Accion de tipo VARCHAR con una longitud adecuada
    FOREIGN KEY (UsuarioId) REFERENCES Usuario(Id),
    FOREIGN KEY (CodProducto) REFERENCES Producto(Codigo)
);
