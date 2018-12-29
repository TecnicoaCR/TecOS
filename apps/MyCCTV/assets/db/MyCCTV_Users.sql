/* Author: TecnicoaCR */

-- Base de datos: `MyCCTV`

-- Estructura de la Tabla Tipo de Usuario
create table tipo_Usuario (
    id_tipo int primary key not null,
    tipo varchar(50) not null
)

-- Inclusión de los Tipos de Usuario
insert into tipo_Usuario (id_tipo,tipo) values ('1', 'Administrador'), ('2', 'Usuario'), ('3', 'Mantenimiento')

-- Estructura de la Tabla 'Usuarios'
create table Usuarios (
    id_usuario serial primary key not null,
    usuario varchar(30) NOT NULL,
    password varchar(80) NOT NULL,
    nombre varchar(50) NOT NULL,
    correo varchar(80) NOT NULL,
    last_session timestamp default null,
    activacion int NOT NULL DEFAULT 0,
    token varchar(40) NOT NULL,
    token_password varchar(100) DEFAULT NULL,
    password_request int DEFAULT 0,
    id_tipo int NOT NULL
)

-- Estructura de la Tabla 'Devices'
CREATE TABLE Devices (
    id_device serial primary key not null,
    name_device varchar(50) not null,
    ip_ device varchar(30) NOT NULL,
    port_device varchar(10) NOT NULL,
    user_device varchar(50) NOT NULL,
    password_device varchar(50) NOT NULL,
    id_usuario int NOT NULL

INSERT INTO Usuarios (id_usuario, usuario, password, nombre, correo, last_session, activacion, token, token_password, password_request, id_tipo) VALUES
('1', 'Admin11', '$2y$10$Xpifigm2D5Pg32EU4iP.0O9LiGkyhvw.rA1dUVYom59Vsy.uad0EG', 'Administrador', 'produccion.tecnicoacr@gmail.com', '2018-12-22 23:45:15', 1, '2451943d7bfd9c3c7379947f12c57b46', '', 1, 1);

