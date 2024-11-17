/**
 * Author:  Luis Ferreras
 * Created: 29 oct 2024
 */
CREATE DATABASE IF NOT EXISTS DB208DWESProyectoTema4;
USE DB208DWESProyectoTema4;
CREATE USER IF NOT EXISTS 'user208DWESProyectoTema4'@'%' IDENTIFIED BY 'paso';
GRANT ALL PRIVILEGES ON DB208DWESProyectoTema4.* TO 'user208DWESProyectoTema4'@'%';
CREATE TABLE IF NOT EXISTS DB208DWESProyectoTema4.T02_Departamento(
    T02_CodDepartamento char(3) PRIMARY KEY,
    T02_DescDepartamento varchar(255),
    T02_FechaCreacionDepartamento datetime DEFAULT CURRENT_TIMESTAMP(),
    T02_VolumenDeNegocio float,
    T02_FechaBajaDepartamento datetime DEFAULT NULL
);