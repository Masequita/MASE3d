CREATE TABLE empleados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(150) NOT NULL,
    rfc VARCHAR(100) NOT NULL,
    sexo VARCHAR(10) NOT NULL,
    telefono VARCHAR(10) NOT NULL,
    email VARCHAR(100) NOT NULL,
    cargo VARCHAR(100) NOT NULL,
    imagen VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO empleados(nombre, apellidos, rfc, sexo, telefono, email, cargo, imagen)VALUES
(3,'Dariana', 'Rangel Guardiola','PEPJ123456','Mujer','8621202360','Dari.r.g2507@gmail.com','Ingeniero de Robotica','Dari_Rangel.jpg'),
(4,'Keyla', 'Silva Chavez','KSC756498','Mujer','8621231230','KeylaCh@gmail.com','Compras','Keyla_Silva.jpg'),
(5,'Yaretsi', 'Silva Chavez','YSC573087','Mujer','8781488517','Yaretsi@gmail.com','Marketing','Yaretsi_Silva.jpg'),
(6,'Anelis', 'Martinez Bocanegra','AMB639087','Mujer','8629875673','AMB@gmail.com','Programador','Ane_Mb.jpg'),
(7,'Yadira', 'Chavez Villa','YCV653482','Mujer','8621096741','Yadira@gmail.com','Ventas','Yaddy_Chv.jpg'),