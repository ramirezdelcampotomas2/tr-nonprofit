
CREATE DATABASE IF NOT EXISTS ORGANIZACION CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE ORGANIZACION;

CREATE TABLE IF NOT EXISTS PROYECTO (
  id_proyecto INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT,
  presupuesto DECIMAL(12,2) NOT NULL DEFAULT 0,
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS DONANTE (
  id_donante INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(120) NOT NULL,
  direccion VARCHAR(200),
  telefono VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS DONACION (
  id_donacion INT AUTO_INCREMENT PRIMARY KEY,
  monto DECIMAL(12,2) NOT NULL,
  fecha DATE NOT NULL,
  id_proyecto INT NOT NULL,
  id_donante INT NOT NULL,
  FOREIGN KEY (id_proyecto) REFERENCES PROYECTO(id_proyecto),
  FOREIGN KEY (id_donante)  REFERENCES DONANTE(id_donante)
);

INSERT INTO PROYECTO (nombre, descripcion, presupuesto, fecha_inicio, fecha_fin) VALUES
('Alimentos','Entrega de cajas solidarias', 150000000, '2025-10-01','2025-12-31'),
('Salud','Operativos médicos', 80000000, '2025-09-01','2025-12-15'),
('Educación','Becas y talleres', 60000000, '2025-08-15','2025-12-30');

INSERT INTO DONANTE (nombre,email,direccion,telefono) VALUES
('Ana Pérez','ana@example.com','Calle 1 #123','+56 9 1111 1111'),
('Bruno Díaz','bruno@example.com','Calle 2 #456','+56 9 2222 2222'),
('Carla Soto','carla@example.com','Calle 3 #789','+56 9 3333 3333');
