

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `estadozona` (
  `IdEstado` int(11) NOT NULL,
  `nombreEstado` varchar(12) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB;


INSERT INTO `estadozona` (`IdEstado`, `nombreEstado`) VALUES
(1, 'Activa'),
(2, 'Inactiva');


CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL,
  `nombre_municipio` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB;



INSERT INTO `municipio` (`id_municipio`, `nombre_municipio`) VALUES
(1, 'Apia'),
(2, 'Balboa'),
(3, 'La Celia'),
(4, 'Belén De Umbría'),
(5, 'Dosquebradas'),
(25, 'Quinchía'),
(27, 'Santuario'),
(29, 'Santa Rosa'),
(33, 'Pueblo Rico'),
(35, 'Guática'),
(37, 'Marsella'),
(39, 'Pereira'),
(41, 'Mistrató'),
(45, 'La virginia');



CREATE TABLE `responsables` (
  `IdResponsable` int(11) NOT NULL,
  `nombreResponsable` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB;



INSERT INTO `responsables` (`IdResponsable`, `nombreResponsable`) VALUES
(1, 'Gobernación'),
(2, 'MinTic');



CREATE TABLE `tipodesitio` (
  `idTipoSitio` int(11) NOT NULL,
  `nombreTipoSitio` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB ;


INSERT INTO `tipodesitio` (`idTipoSitio`, `nombreTipoSitio`) VALUES
(1, 'Sedes Educativas'),
(2, 'Zona Digital Urbana');





CREATE TABLE `zonas` (
  `id_zona` int(11) NOT NULL,
  `nombre_zona` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL,
  `enlaceGoogleMaps` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipoDeEnlace` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `IdResponsable` int(11) NOT NULL,
  `IdEstado` int(11) NOT NULL,
  `idTipoSitio` int(11) NOT NULL,
  `estadoMostrar` int(1) NOT NULL,
  `urlImagen` varchar(40) NOT NULL
) ENGINE=InnoDB ;



INSERT INTO `zonas` (`id_zona`, `nombre_zona`, `latitud`, `longitud`, `enlaceGoogleMaps`, `tipoDeEnlace`, `id_municipio`, `IdResponsable`, `IdEstado`, `idTipoSitio`, `estadoMostrar`, `urlImagen`) VALUES
(1, 'Galería', 5.10562, -75.94199, 'https://www.google.com/maps/place/5%C2%B006\'20.2%22N+75%C2%B056\'31.2%22W/@5.1058497,-75.9439802,17z/data=!4m5!3m4!1s0x0:0x0!8m2!3d5.10562!4d-75.94199', 'Radio Enlace', 1, 2, 1, 1, 1, ''),
(2, 'Parque Principal', 5.10666, -75.94239, 'https://www.google.com/maps/place/5%C2%B006\'24.0%22N+75%C2%B056\'32.6%22W/@5.1066813,-75.9511233,15z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d5.10666!4d-75.94239', 'Radio Enlace', 1, 1, 1, 1, 1, ''),
(5, 'Jordanía - Corregimiento O Centro Poblado', 5.145233, -75.962802, 'https://www.google.com/maps/place/5%C2%B008\'42.8%22N+75%C2%B057\'46.1%22W/@5.1452383,-75.9649907,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d5.145233!4d-75.962802?hl=es', 'Radio Enlace', 1, 1, 1, 1, 1, ''),
(6, 'Vereda La Marìa - Apia', 5.12027, -75.94832, 'https://www.google.com/maps/place/5%C2%B007\'13.0%22N+75%C2%B056\'54.0%22W/@5.1202753,-75.9505087,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d5.12027!4d-75.94832?hl=es', 'Radio enlace', 1, 1, 1, 1, 1, ''),
(7, 'Parque Principal', 4.948996, -75.95797, 'https://www.google.com/maps/place/4%C2%B056\'56.4%22N+75%C2%B057\'28.7%22W/@4.949155,-75.9601851,17z/data=!4m5!3m4!1s0x0:0x0!8m2!3d4.948996!4d-75.95797', 'Radio enlace', 2, 1, 1, 1, 1, ''),
(8, 'Hospital - Balboa', 4.951279, -75.959039, 'https://www.google.com/maps/place/4%C2%B057\'04.6%22N+75%C2%B057\'32.5%22W/@4.9511987,-75.9597875,18z/data=!4m5!3m4!1s0x0:0x0!8m2!3d4.951279!4d-75.959039', 'Radio enlace', 2, 1, 1, 1, 1, ''),
(9, 'Tambores - Corregimiento O Centro Poblado', 4.88222, -75.974882, 'https://www.google.com/maps/place/4%C2%B052\'56.0%22N+75%C2%B058\'29.6%22W/@4.8822253,-75.9770707,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.88222!4d-75.974882?hl=es', 'Radio enlace', 2, 1, 1, 1, 1, ''),
(10, 'La Plazuela', 5.20324, -75.8666, 'https://www.google.com/maps/place/5%C2%B012\'11.7%22N+75%C2%B051\'59.8%22W/@5.2032453,-75.8687887,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d5.20324!4d-75.8666?hl=es', 'Radio enlace', 4, 1, 1, 1, 1, ''),
(11, 'Parque Principal', 5.20107, -75.86901, 'https://www.google.com/maps/place/5%C2%B012\'03.9%22N+75%C2%B052\'08.4%22W/@5.2010753,-75.8711987,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d5.20107!4d-75.86901?hl=es', 'Radio enlace', 4, 1, 1, 1, 1, ''),
(12, 'Patinodromo', 5.20107, -75.87179, 'https://www.google.com/maps/place/5%C2%B012\'03.9%22N+75%C2%B052\'18.4%22W/@5.2010753,-75.8739787,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d5.20107!4d-75.87179?hl=es', 'Radio enlace', 4, 1, 1, 1, 1, ''),
(13, 'Taparcal  + 1 Ap Extendido', 5.16855, -75.86167, 'https://www.google.com/maps/place/5%C2%B010\'06.8%22N+75%C2%B051\'42.0%22W/@5.1686928,-75.8636334,17z/data=!4m5!3m4!1s0x0:0x0!8m2!3d5.16855!4d-75.86167?hl=es', 'Radio enlace', 4, 1, 1, 1, 1, ''),
(14, 'Columbia - Corregimiento O Centro Poblado', 5.216902, -75.821204, 'https://www.google.com/maps/place/5%C2%B013\'00.9%22N+75%C2%B049\'16.3%22W/@5.2169073,-75.8233927,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d5.216902!4d-75.821204?hl=es', 'Radio enlace', 4, 1, 1, 1, 1, ''),
(15, 'Parque Principal', 5.00433, -76.00248, 'https://www.google.com/maps/place/5%C2%B000\'15.6%22N+76%C2%B000\'08.9%22W/@5.0043353,-76.0046687,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d5.00433!4d-76.00248?hl=es', 'Radio enlace', 3, 1, 1, 1, 1, ''),
(16, 'Campiña Hogar Colombiano', 4.99884, -76.0027, 'https://www.google.com/maps/place/4%C2%B059\'55.8%22N+76%C2%B000\'09.7%22W/@4.9988453,-76.0048887,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.99884!4d-76.0027?hl=es', 'Radio enlace', 3, 1, 1, 1, 1, ''),
(17, 'Verdum - Corregimiento O Centro Poblado', 5.003745, -76.016993, 'https://www.google.com/maps/place/5%C2%B000\'13.5%22N+76%C2%B001\'01.2%22W/@5.0037503,-76.0191817,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d5.003745!4d-76.016993?hl=es', 'Radio enlace', 3, 1, 1, 1, 1, ''),
(18, 'Patio Bonito  + 1 Ap Extendido', 4.99469, -75.97989, 'https://www.google.com/maps/place/4%C2%B059\'40.9%22N+75%C2%B058\'47.6%22W/@4.9946953,-75.9820787,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.99469!4d-75.97989?hl=es', 'Radio enlace', 3, 1, 1, 1, 1, ''),
(19, 'Camilo Torres', 4.84398, -75.65774, 'https://www.google.com/maps/place/4%C2%B050\'38.3%22N+75%C2%B039\'27.9%22W/@4.8439853,-75.6599287,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.84398!4d-75.65774?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(20, 'La Capilla - El Otún - San Judas', 4.81673, -75.68395, 'https://www.google.com/maps/place/4%C2%B049\'00.2%22N+75%C2%B041\'02.2%22W/@4.8167353,-75.6861387,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.81673!4d-75.68395?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(21, 'Cic Campestre', 4.83359, -75.69026, 'https://www.google.com/maps/place/4%C2%B050\'00.9%22N+75%C2%B041\'24.9%22W/@4.8335953,-75.6924487,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.83359!4d-75.69026?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(22, 'La Esneda', 4.82109, -75.69521, 'https://www.google.com/maps/place/4%C2%B049\'15.9%22N+75%C2%B041\'42.8%22W/@4.8210953,-75.6973987,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.82109!4d-75.69521?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(23, 'Villa Alexandra', 4.82586, -75.69715, 'https://www.google.com/maps/place/4%C2%B049\'33.1%22N+75%C2%B041\'49.7%22W/@4.8258653,-75.6993387,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.82586!4d-75.69715?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(24, 'La Pradera', 4.84367, -75.65439, 'https://www.google.com/maps/place/4%C2%B050\'37.2%22N+75%C2%B039\'15.8%22W/@4.8436753,-75.6565787,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.84367!4d-75.65439?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(25, 'Parque Los Reyes', 4.84225, -75.67399, 'https://www.google.com/maps/place/4%C2%B050\'32.1%22N+75%C2%B040\'26.4%22W/@4.8419598,-75.6746659,17z/data=!4m5!3m4!1s0x0:0x0!8m2!3d4.84225!4d-75.67399?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(26, 'Parque Los Lagos', 4.82504, -75.66542, 'https://www.google.com/maps/place/4%C2%B049\'30.1%22N+75%C2%B039\'55.5%22W/@4.8247669,-75.6677092,16.75z/data=!4m5!3m4!1s0x0:0x0!8m2!3d4.82504!4d-75.66542?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(27, 'Primavera Azul', 4.83424, -75.66, 'https://www.google.com/maps/place/4%C2%B050\'03.3%22N+75%C2%B039\'36.0%22W/@4.8342453,-75.6621887,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.83424!4d-75.66?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(28, 'Sena Santa Isabel', 4.8367971, -75.6831741, 'https://www.google.com/maps/place/CDITI+SENA+Dosquebradas/@4.8367971,-75.6831741,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3881a4b50bb31d:0x9150c2e299ed35b0!8m2!3d4.8367916!4d-75.6809938?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(29, 'Los Naranjos Carrera 15 Calles 49 Y 50', 4.83983, -75.66772, 'https://www.google.com/maps/place/4%C2%B050\'23.4%22N+75%C2%B040\'03.8%22W/@4.8396509,-75.6687339,18z/data=!4m5!3m4!1s0x0:0x0!8m2!3d4.83983!4d-75.66772?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(30, 'Pueblo Sol Bajo Calle 69A Carrera 25 Barrio Pueblo', 4.84367, -75.65439, 'https://www.google.com/maps/place/4%C2%B050\'37.2%22N+75%C2%B039\'15.8%22W/@4.8436727,-75.6554843,18z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.84367!4d-75.65439?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(31, 'La Sultana', 4.81788, -75.67542, 'https://www.google.com/maps/place/4%C2%B049\'04.4%22N+75%C2%B040\'31.5%22W/@4.8178853,-75.6776087,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.81788!4d-75.67542?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(32, 'El Balso Calle 2 No. 22-03', 4.81552, -75.68177, 'https://www.google.com/maps/place/4%C2%B048\'55.9%22N+75%C2%B040\'54.4%22W/@4.8155253,-75.6839587,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.81552!4d-75.68177?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(33, 'El Japon Calle 10 No. 24-23 Parroquia', 4.81716, -75.67779, 'https://www.google.com/maps/place/4%C2%B049\'01.8%22N+75%C2%B040\'40.0%22W/@4.8171653,-75.6799787,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.81716!4d-75.67779?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(34, 'La Mariana + 1 Ap Extendido Calle 72 Con Cra 16 D ', 4.84941, -75.65731, 'https://www.google.com/maps/place/4%C2%B050\'57.9%22N+75%C2%B039\'26.3%22W/@4.8502055,-75.658784,17z/data=!4m5!3m4!1s0x0:0x0!8m2!3d4.84941!4d-75.65731?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(35, 'Pinos/Guamos + 1 Ap Extendido Mz 1 Casa 1 B Los Gu', 4.86131, -75.66101, 'https://www.google.com/maps/place/4%C2%B051\'40.7%22N+75%C2%B039\'39.6%22W/@4.8613153,-75.6631987,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.86131!4d-75.66101?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(36, 'Santa Teresita  Etb', 4.84312, -75.66377, 'https://www.google.com/maps/place/4%C2%B050\'35.2%22N+75%C2%B039\'49.6%22W/@4.8431253,-75.6659587,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.84312!4d-75.66377?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(37, 'Santa Ana Alta Escuela Cristobal Colon', 4.85843, -75.68692, 'https://www.google.com/maps/place/4%C2%B051\'30.4%22N+75%C2%B041\'12.9%22W/@4.85844,-75.6869998,20z/data=!4m5!3m4!1s0x0:0x0!8m2!3d4.85843!4d-75.68692?hl=es', 'Radio enlace', 5, 1, 1, 1, 1, ''),
(38, 'Júpiter', 4.85175, -75.65675, 'https://www.google.com/maps/place/4%C2%B051\'06.3%22N+75%C2%B039\'24.3%22W/@4.852036,-75.6576593,18z/data=!4m5!3m4!1s0x0:0x0!8m2!3d4.85175!4d-75.65675?hl=es', 'Fibra', 5, 1, 1, 1, 1, ''),
(39, 'Santa Ana', 5.308, -75.81928, 'https://www.google.com/maps/place/5%C2%B018\'28.8%22N+75%C2%B049\'09.4%22W/@5.3080053,-75.8214687,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d5.308!4d-75.81928?hl=es', 'Radio enlace', 35, 1, 1, 1, 1, ''),
(40, 'Travesias', 5.28441, -75.83192, 'https://www.google.com/maps/place/5%C2%B017\'03.9%22N+75%C2%B049\'54.9%22W/@5.284207,-75.8368445,16z/data=!4m5!3m4!1s0x0:0x0!8m2!3d5.28441!4d-75.83192?hl=es', 'Radio enlace', 35, 1, 1, 1, 1, ''),
(41, 'El Vergel Bajo - Corregimiento O Centro Poblado', 5.308951, -75.801971, 'https://www.google.com/maps/place/5%C2%B018\'32.2%22N+75%C2%B048\'07.1%22W/@5.3099535,-75.8158512,14.75z/data=!4m5!3m4!1s0x0:0x0!8m2!3d5.308951!4d-75.801971?hl=es', 'Radio enlace', 35, 1, 1, 1, 1, ''),
(42, 'Milán - Corregimiento O Centro Poblado', 5.3411, -76.14571, 'https://www.google.com/maps/place/5%C2%B020\'28.0%22N+76%C2%B008\'44.6%22W/@5.3411053,-76.1478987,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d5.3411!4d-76.14571?hl=es', 'Radio enlace', 35, 1, 1, 1, 1, ''),
(43, 'El Paraiso - Corregimiento O Centro Poblado', 5.301153, -75.798487, 'https://www.google.com/maps/place/5%C2%B018\'04.2%22N+75%C2%B047\'54.6%22W/@5.3009794,-75.7992809,18z/data=!4m5!3m4!1s0x0:0x0!8m2!3d5.301153!4d-75.798487?hl=es', 'Radio enlace', 35, 1, 1, 1, 1, ''),
(44, 'Alcaldía Parque Principal', 5.31549, -75.80083, 'https://www.google.com/maps/place/5%C2%B018\'55.8%22N+75%C2%B048\'03.0%22W/@5.3154927,-75.8019243,18z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d5.31549!4d-75.80083?hl=es', 'Radio enlace', 35, 1, 1, 1, 1, ''),
(45, 'San Clemente ', 5.31722, -75.7873, 'https://www.google.com/maps/place/5%C2%B019\'02.0%22N+75%C2%B047\'14.3%22W/@5.3172253,-75.7894887,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d5.31722!4d-75.7873?hl=es', 'Radio enlace', 35, 1, 1, 1, 1, ''),
(46, 'Galería', 4.93874, -75.73834, 'https://www.google.com/maps/place/4%C2%B056\'19.5%22N+75%C2%B044\'18.0%22W/@4.9387453,-75.7405287,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.93874!4d-75.73834?hl=es', 'Radio enlace', 37, 1, 1, 1, 1, ''),
(47, 'Parque Principal', 4.93649, -75.73867, '', 'Radio enlace', 37, 1, 1, 1, 1, ''),
(48, 'El Rayo - Corregimiento O Centro Poblado', 4.99151, -75.9251, '', 'Radio enlace', 37, 1, 1, 1, 1, ''),
(49, 'Estación Pereira', 4.90623, -75.81449, '', 'Radio enlace', 37, 1, 1, 1, 1, ''),
(50, 'Parque Principal', 5.29616, -75.88255, '', 'Radio enlace', 41, 1, 1, 1, 1, ''),
(51, 'San Antonio Del Chamí - Corregimiento O Centro Pob', 5.41649, -75.90387, '', 'Satelital', 41, 1, 1, 1, 1, ''),
(52, 'Parque Principal', 5.22159, -76.03066, '', 'Radio enlace', 33, 1, 1, 1, 1, ''),
(53, 'Villa Claret Corregimiento O Centro Poblado', 5.316105, -75.994881, '', 'Satelital', 33, 1, 1, 1, 1, ''),
(54, 'Santa Teresa', 0, 0, '', 'Satelital', 33, 1, 1, 1, 1, ''),
(55, 'Santa Cecilia Parque Principal', 5.3411, -76.14571, '', 'Satelital', 33, 1, 1, 1, 1, ''),
(56, 'Plaza Bolivar Irra', 5.27115, -75.66661, '', 'Radio enlace', 25, 1, 1, 1, 1, ''),
(57, 'Batero - Corregimiento O Centro Poblado', 4.88767, -75.62384, '', '', 25, 1, 1, 1, 1, ''),
(58, 'Plaza La Paz', 5.3377, -75.73059, '', 'Radio enlace', 25, 1, 1, 1, 1, ''),
(59, 'Parque Principal', 5.07331, -75.96247, '', '', 27, 1, 1, 1, 1, ''),
(60, 'La Bretaña  - Corregimiento O Centro Poblado', 4.902, -75.87785, '', '', 27, 1, 1, 1, 1, ''),
(61, 'Peralonso', 4.99151, -75.9251, '', '', 27, 1, 1, 1, 1, ''),
(62, 'Alcaldía', 4.86493, -75.62071, '', '', 29, 1, 1, 1, 1, ''),
(63, 'Barrios Unidos', 4.85816, -75.6183, '', '', 29, 1, 1, 1, 1, ''),
(64, 'El Español  - Corregimiento O Centro Poblado', 4.89851, -75.88729, '', '', 29, 1, 1, 1, 1, ''),
(65, 'Cedralito-Las Mangas  - Corregimiento O Centro Pob', 4.79719, -75.82041, '', '', 29, 1, 1, 1, 1, ''),
(66, 'Galería', 4.86701, -75.61958, '', '', 29, 1, 1, 1, 1, ''),
(67, 'Parque Los Fundadores', 4.86089, -75.61862, '', '', 29, 1, 1, 1, 1, ''),
(68, 'Parque El Hueco', 4.8679, -75.61654, '', '', 29, 1, 1, 1, 1, ''),
(69, 'Polideportivo La Hermosa  Etb', 4.86753, -75.62869, '', '', 29, 1, 1, 1, 1, ''),
(70, 'Villa Gladys + 2 Aps Extendidos Cra 11 B No. 37 B ', 4.88767, -75.62384, '', '', 29, 1, 1, 1, 1, ''),
(71, 'Parque Fundadores', 4.89683, -75.88191, '', '', 45, 1, 1, 1, 1, ''),
(72, 'Barrio Libertador', 4.89113, -75.87074, '', '', 45, 1, 1, 1, 1, ''),
(73, 'Parque Pio - Xii', 4.902, -75.87785, '', '', 45, 1, 1, 1, 1, ''),
(74, 'Parque Lineal Sopinga', 4.90385, -75.87988, '', '', 45, 1, 1, 1, 1, ''),
(75, 'El Aguacate - Corregimiento O Centro Poblado', 4.896786, -75.846049, '', '', 45, 1, 1, 1, 1, ''),
(76, 'Parque Principal', 4.8943, -75.8834, '', '', 45, 1, 1, 1, 1, ''),
(77, 'La Bombonera', 4.89851, -75.88729, '', '', 45, 1, 1, 1, 1, ''),
(78, 'Las Colonias + 1Ap Extendido', 4.79719, -75.82041, '', '', 39, 1, 1, 1, 1, ''),
(79, 'Estación Villegas', 4.7975, -75.82654, '', '', 39, 1, 1, 1, 1, ''),
(80, 'Galicia Galicia Barrio La Esperanza', 4.80708, -75.8084, '', '', 39, 1, 1, 1, 1, ''),
(81, 'Caimalito', 4.88415, -75.87584, '', '', 39, 1, 1, 1, 1, ''),
(82, 'Ciudadela Comfamiliar Calle 82 No. 28-12', 4.79754, -75.73807, '', '', 39, 1, 1, 1, 1, ''),
(83, 'Restrepo Calle 66 Bis Mz 1 Cancha', 4.80488, -75.73174, '', '', 39, 1, 1, 1, 1, ''),
(84, 'La Esneda', 4.82109, -75.69521, 'https://www.google.com/maps/place/4%C2%B049\'15.9%22N+75%C2%B041\'42.8%22W/@4.8210953,-75.6973987,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d4.82109!4d-75.69521?hl=es', 'Fibra', 5, 1, 1, 1, 1, '');



ALTER TABLE `estadozona`
  ADD PRIMARY KEY (`IdEstado`);


ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`);


ALTER TABLE `responsables`
  ADD PRIMARY KEY (`IdResponsable`);


ALTER TABLE `tipodesitio`
  ADD PRIMARY KEY (`idTipoSitio`);


ALTER TABLE `zonas`
  ADD KEY `FK_municipio` (`id_municipio`),
  ADD KEY `FK_responsable` (`IdResponsable`),
  ADD KEY `FK_estado` (`IdEstado`),
  ADD KEY `FK_tipodesitio` (`idTipoSitio`);


ALTER TABLE `estadozona`
  MODIFY `IdEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

ALTER TABLE `responsables`
  MODIFY `IdResponsable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `tipodesitio`
  MODIFY `idTipoSitio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `zonas`
  ADD CONSTRAINT `FK_estado` FOREIGN KEY (`IdEstado`) REFERENCES `estadozona` (`IdEstado`),
  ADD CONSTRAINT `FK_municipio` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`),
  ADD CONSTRAINT `FK_responsable` FOREIGN KEY (`IdResponsable`) REFERENCES `responsables` (`IdResponsable`),
  ADD CONSTRAINT `FK_tipodesitio` FOREIGN KEY (`idTipoSitio`) REFERENCES `tipodesitio` (`idTipoSitio`);
COMMIT;


