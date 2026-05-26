-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2025 a las 01:09:34
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hv3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `educacion`
--

CREATE TABLE `educacion` (
  `id_estudio` int(3) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `titulo_estudio` varchar(60) NOT NULL,
  `entidad` varchar(60) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `nro_doc_persona` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `educacion`
--

INSERT INTO `educacion` (`id_estudio`, `fecha_ini`, `fecha_fin`, `titulo_estudio`, `entidad`, `descripcion`, `nro_doc_persona`) VALUES
(1, '2010-01-01', '2012-12-31', 'Técnico en Sistemas', 'SENA', 'Bases de programación', 1001),
(2, '2013-01-01', '2016-12-31', 'Ingeniería de Sistemas', 'Universidad Nacional', 'Desarrollo de software', 1001),
(3, '2017-01-01', '2017-12-31', 'Diplomado en Bases de Datos', 'UNIANDES', 'Gestión SQL y NoSQL', 1001),
(4, '2018-01-01', '2018-06-30', 'Curso PHP Avanzado', 'Platzi', 'PHP y frameworks modernos', 1001),
(5, '2019-01-01', '2019-12-31', 'Curso Full Stack', 'Coursera', 'Frontend y Backend', 1001),
(6, '2011-01-01', '2013-12-31', 'Técnico en Administración', 'SENA', 'Gestión empresarial', 1002),
(7, '2014-01-01', '2017-12-31', 'Administración de Empresas', 'UdeA', 'Gestión de proyectos', 1002),
(8, '2018-01-01', '2018-06-30', 'Diplomado en Finanzas', 'Politécnico JIC', 'Finanzas corporativas', 1002),
(9, '2019-01-01', '2019-12-31', 'Curso Scrum Master', 'Scrum.org', 'Gestión ágil', 1002),
(10, '2020-01-01', '2020-12-31', 'Marketing Digital', 'Platzi', 'Estrategias digitales', 1002),
(11, '2010-01-01', '2012-12-31', 'Técnico en Programación', 'SENA', 'Lenguajes básicos', 1003),
(12, '2013-01-01', '2017-12-31', 'Ingeniería de Software', 'ICESI', 'Arquitectura de software', 1003),
(13, '2018-01-01', '2018-12-31', 'Diplomado en Ciencia de Datos', 'MITx', 'Data Science', 1003),
(14, '2019-01-01', '2019-06-30', 'Curso de React', 'Udemy', 'Frontend avanzado', 1003),
(15, '2020-01-01', '2021-12-31', 'Machine Learning', 'Coursera', 'IA aplicada', 1003),
(16, '2012-01-01', '2014-12-31', 'Diseño Gráfico', 'Uninorte', 'Diseño visual', 1004),
(17, '2015-01-01', '2018-12-31', 'Comunicación Social', 'Uninorte', 'Gestión de medios', 1004),
(18, '2019-01-01', '2019-12-31', 'UX/UI Design', 'Google', 'Experiencia de usuario', 1004),
(19, '2020-01-01', '2020-06-30', 'Curso de Figma', 'Udemy', 'Diseño de interfaces', 1004),
(20, '2021-01-01', '2022-12-31', 'Illustrator Avanzado', 'Domestika', 'Diseño profesional', 1004),
(21, '2008-01-01', '2010-12-31', 'Técnico en Redes', 'SENA', 'Infraestructura TI', 1005),
(22, '2011-01-01', '2015-12-31', 'Ingeniería Informática', 'UTB', 'Desarrollo y redes', 1005),
(23, '2016-01-01', '2017-12-31', 'Diplomado en NodeJS', 'Platzi', 'Backend avanzado', 1005),
(24, '2018-01-01', '2018-12-31', 'Curso de MongoDB', 'MongoDB University', 'Bases NoSQL', 1005),
(25, '2019-01-01', '2020-12-31', 'Arquitectura Cloud', 'AWS Academy', 'Servicios en la nube', 1005);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `logo_foto` varchar(30) DEFAULT NULL,
  `nombre_delegado` varchar(50) NOT NULL,
  `cargo_delegado` varchar(40) NOT NULL,
  `correo_empresa` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `telefono_empresa` bigint(12) NOT NULL,
  `pagweb_empresa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre_empresa`, `logo_foto`, `nombre_delegado`, `cargo_delegado`, `correo_empresa`, `password`, `telefono_empresa`, `pagweb_empresa`) VALUES
(2001, 'TechSolutions', '1756679616_company1.png', 'Carlos Pérez', 'Gerente RRHH', 'cape@correo', '2001', 6017894561, 'ts.com'),
(2002, 'InnovaSoft', '1756679638_company2.png', 'Mariana Díaz', 'Directora Talento', 'madi@correo', '2002', 6046549871, 'is.com'),
(2003, 'DigitalWorld', '1756679664_company3.png', 'José Ramírez', 'CEO', 'jora@correo', '2003', 3024567890, 'dw.com'),
(2004, 'NextGen IT', '1756679685_company4.png', 'Ana Torres', 'Líder Selección', 'anto@correo', '2004', 3056789123, 'ng.com'),
(2005, 'CloudWare', '1756679711_company5.png', 'Felipe López', 'Director RRHH', 'felo@correo', '2005', 6043219876, 'cw.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia`
--

CREATE TABLE `experiencia` (
  `id_experiencia` int(3) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `descripcion_funciones` varchar(150) NOT NULL,
  `nro_doc_persona` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `experiencia`
--

INSERT INTO `experiencia` (`id_experiencia`, `fecha_ini`, `fecha_fin`, `cargo`, `empresa`, `descripcion_funciones`, `nro_doc_persona`) VALUES
(1, '2013-01-01', '2014-12-31', 'Soporte Técnico', 'TechSolutions', 'Atención de incidencias', 1001),
(2, '2015-01-01', '2016-12-31', 'Desarrollador Junior', 'TechSolutions', 'Módulos PHP', 1001),
(3, '2017-01-01', '2018-12-31', 'Desarrollador Backend', 'InnovaSoft', 'APIs con Laravel', 1001),
(4, '2019-01-01', '2020-12-31', 'Líder Técnico', 'NextGen IT', 'Gestión de equipo', 1001),
(5, '2021-01-01', '2022-12-31', 'Arquitecto de Software', 'CloudWare', 'Diseño de soluciones', 1001),
(6, '2014-01-01', '2015-12-31', 'Asistente Administrativo', 'InnovaSoft', 'Gestión documental', 1002),
(7, '2016-01-01', '2017-12-31', 'Analista de Proyectos', 'DigitalWorld', 'Seguimiento de proyectos', 1002),
(8, '2018-01-01', '2019-12-31', 'Scrum Master', 'NextGen IT', 'Facilitador ágil', 1002),
(9, '2020-01-01', '2021-12-31', 'Jefe de Talento Humano', 'CloudWare', 'Selección de personal', 1002),
(10, '2022-01-01', '2023-12-31', 'Coordinador de Proyectos', 'TechSolutions', 'Gestión de equipos', 1002),
(11, '2014-01-01', '2015-12-31', 'Programador Junior', 'DigitalWorld', 'Frontend en JS', 1003),
(12, '2016-01-01', '2017-12-31', 'Desarrollador Python', 'InnovaSoft', 'APIs Django', 1003),
(13, '2018-01-01', '2019-12-31', 'Ingeniero de Datos', 'TechSolutions', 'ETL y Data Warehouse', 1003),
(14, '2020-01-01', '2021-12-31', 'Científico de Datos', 'CloudWare', 'Modelos predictivos', 1003),
(15, '2022-01-01', '2023-12-31', 'Arquitecto Big Data', 'NextGen IT', 'Gestión de datos masivos', 1003),
(16, '2015-01-01', '2016-12-31', 'Diseñadora Gráfica', 'DigitalWorld', 'Publicidad digital', 1004),
(17, '2017-01-01', '2018-12-31', 'Community Manager', 'NextGen IT', 'Gestión redes sociales', 1004),
(18, '2019-01-01', '2020-12-31', 'UX Designer', 'InnovaSoft', 'Interfaces de usuario', 1004),
(19, '2021-01-01', '2022-12-31', 'Product Designer', 'TechSolutions', 'Diseño de productos', 1004),
(20, '2023-01-01', '2023-12-31', 'Líder UX/UI', 'CloudWare', 'Diseño de experiencia', 1004),
(21, '2010-01-01', '2011-12-31', 'Soporte en Redes', 'CloudWare', 'Infraestructura básica', 1005),
(22, '2012-01-01', '2013-12-31', 'Administrador de Sistemas', 'TechSolutions', 'Servidores y redes', 1005),
(23, '2014-01-01', '2015-12-31', 'Desarrollador NodeJS', 'InnovaSoft', 'APIs en Node', 1005),
(24, '2016-01-01', '2017-12-31', 'Ingeniero DevOps', 'NextGen IT', 'Automatización CI/CD', 1005),
(25, '2018-01-01', '2019-12-31', 'Arquitecto Cloud', 'DigitalWorld', 'Servicios en la nube', 1005);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `nro_documento` bigint(20) NOT NULL,
  `tipo_documento` varchar(2) NOT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion_residencia` varchar(80) NOT NULL,
  `ciudad_residencia` varchar(20) NOT NULL,
  `correo_electronico` varchar(30) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `hab1` varchar(25) NOT NULL,
  `hab2` varchar(25) NOT NULL,
  `hab3` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`nro_documento`, `tipo_documento`, `foto`, `nombres`, `apellidos`, `fecha_nacimiento`, `direccion_residencia`, `ciudad_residencia`, `correo_electronico`, `telefono`, `password`, `sexo`, `hab1`, `hab2`, `hab3`) VALUES
(1001, 'CC', '1756679004_user1.png', 'Mauricio', 'Sierra', '1995-04-12', 'Cra 45 #23-10', 'Bogotá', 'masi@correo', 3104567890, '1001', 'M', 'PHP', 'MySQL', 'Bootstrap'),
(1002, 'CC', '1756679066_user2.png', 'Laura', 'Gómez', '1998-08-25', 'Cl 12 #8-15', 'Medellín', 'lago@correo', 3157896540, '1002', 'F', 'Java', 'Spring', 'Angular'),
(1003, 'TI', '1756679100_user3.png', 'Andrés', 'Ramírez', '1992-11-05', 'Av 30 #22-45', 'Cali', 'anra@correo', 3006549871, '1003', 'M', 'Python', 'Django', 'React'),
(1004, 'CC', '1756679147_user4.png', 'Sofía', 'Martínez', '1997-02-17', 'Cl 40 #15-21', 'Barranquilla', 'soma@correo', 3017894562, '1004', 'F', 'UX', 'Figma', 'Illustrator'),
(1005, 'CC', '1756679212_user5.png', 'Camilo', 'Torres', '1990-09-29', 'Cra 12 #33-18', 'Cartagena', 'cato@correo', 3209876543, '1005', 'M', 'NodeJS', 'Express', 'MongoDB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio`
--

CREATE TABLE `portafolio` (
  `id_proyecto` int(11) NOT NULL,
  `nombre_proyecto` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion_proyecto` varchar(150) NOT NULL,
  `foto` varchar(80) DEFAULT NULL,
  `link_proyecto` varchar(80) DEFAULT NULL,
  `nro_doc_persona` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `portafolio`
--

INSERT INTO `portafolio` (`id_proyecto`, `nombre_proyecto`, `fecha`, `descripcion_proyecto`, `foto`, `link_proyecto`, `nro_doc_persona`) VALUES
(1, 'App Reservas', '2021-01-01', 'App de reservas online', '1756681030_pro1.png', 'https://www.iconfinder.com/icons/4206649/clipboard_curriculum_cv_document_paper_', 1001),
(2, 'Sistema Nómina', '2021-06-01', 'Gestión de nómina', NULL, 'nomina.com', 1001),
(3, 'CRM Clientes', '2022-03-01', 'CRM de clientes', NULL, 'crm.com', 1001),
(4, 'Blog Personal', '2022-09-01', 'Blog con Bootstrap', NULL, 'blog.com', 1001),
(5, 'E-commerce', '2023-04-01', 'Tienda online', NULL, 'shop.com', 1001),
(6, 'Gestión Proyectos', '2020-02-01', 'Plataforma de proyectos', NULL, 'proyectos.com', 1002),
(7, 'Intranet Empresa', '2020-07-01', 'Portal interno empresa', NULL, 'intranet.com', 1002),
(8, 'Sistema Ventas', '2021-02-01', 'Gestión de ventas', NULL, 'ventas.com', 1002),
(9, 'Plataforma E-learning', '2022-05-01', 'Cursos online', NULL, 'elearning.com', 1002),
(10, 'Dashboard BI', '2023-01-01', 'Panel de BI', NULL, 'dashboard.com', 1002),
(11, 'API Datos', '2019-01-01', 'API en Django', NULL, 'api.com', 1003),
(12, 'App Finanzas', '2020-06-01', 'Control financiero', NULL, 'finanzas.com', 1003),
(13, 'Analítica Web', '2021-03-01', 'Plataforma analítica', NULL, 'analitica.com', 1003),
(14, 'Plataforma Noticias', '2022-07-01', 'Portal de noticias', NULL, 'noticias.com', 1003),
(15, 'Red Social', '2023-04-01', 'Clon de red social', NULL, 'social.com', 1003),
(16, 'Portafolio Creativo', '2020-03-01', 'Portafolio diseño', NULL, 'creativo.com', 1004),
(17, 'Landing Page', '2020-09-01', 'Página de aterrizaje', NULL, 'landing.com', 1004),
(18, 'App Moda', '2021-04-01', 'Aplicación de moda', NULL, 'moda.com', 1004),
(19, 'Revista Digital', '2022-02-01', 'Revista online', NULL, 'revista.com', 1004),
(20, 'UI Kit', '2023-01-01', 'Kit de interfaces', NULL, 'uikit.com', 1004),
(21, 'Sistema Logístico', '2018-01-01', 'Gestión logística', NULL, 'logistica.com', 1005),
(22, 'App IoT', '2019-05-01', 'Monitoreo IoT', NULL, 'iot.com', 1005),
(23, 'Plataforma Cloud', '2020-07-01', 'Servicios en la nube', NULL, 'cloud.com', 1005),
(24, 'App Inventario', '2021-02-01', 'Gestión de inventario', NULL, 'inventario.com', 1005),
(25, 'Dashboard TI', '2022-09-01', 'Panel de control TI', NULL, 'ti.com', 1005);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulacion`
--

CREATE TABLE `postulacion` (
  `pers_id` bigint(20) NOT NULL,
  `vac_id` int(8) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `observaciones` varchar(40) NOT NULL,
  `fecha_postulacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `postulacion`
--

INSERT INTO `postulacion` (`pers_id`, `vac_id`, `estado`, `observaciones`, `fecha_postulacion`) VALUES
(1001, 1, 'Rechazado', 'No cumple con los requisitos', '2025-09-01'),
(1001, 6, 'Pendiente', '', '2025-09-01'),
(1001, 11, 'Aprobado', 'Te esperamos el lunes a las 7 am', '2025-09-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacante`
--

CREATE TABLE `vacante` (
  `vacant_id` int(8) NOT NULL,
  `empr_id` int(11) NOT NULL,
  `cargo` varchar(40) NOT NULL,
  `desc_cargo` varchar(100) NOT NULL,
  `nro_vacantes` int(3) NOT NULL,
  `requisitos` varchar(100) NOT NULL,
  `exp_requerida` int(3) NOT NULL,
  `tipo_vinculo` varchar(30) NOT NULL,
  `ubicacion` varchar(30) NOT NULL,
  `salario` bigint(20) NOT NULL,
  `fecha_cierre` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vacante`
--

INSERT INTO `vacante` (`vacant_id`, `empr_id`, `cargo`, `desc_cargo`, `nro_vacantes`, `requisitos`, `exp_requerida`, `tipo_vinculo`, `ubicacion`, `salario`, `fecha_cierre`) VALUES
(1, 2001, 'Desarrollador Junior', 'Desarrollo de aplicaciones web', 4, 'Conocimientos en PHP y MySQL', 1, 'Tiempo completo', 'Bogotá', 2000000, '2025-02-01'),
(2, 2001, 'Analista QA', 'Pruebas de software', 2, 'Experiencia en testing manual y automatizado', 1, 'Tiempo completo', 'Bogotá', 1800000, '2025-02-05'),
(3, 2001, 'Soporte Técnico', 'Atención incidencias', 1, 'Manejo de hardware y software', 3, 'Tiempo completo', 'Bogotá', 1500000, '2025-02-10'),
(4, 2001, 'Líder de Proyecto', 'Gestión de proyectos', 1, 'Certificación PMP o Scrum Master', 3, 'Tiempo completo', 'Bogotá', 3000000, '2025-02-15'),
(5, 2001, 'Administrador BD', 'Manejo de bases de datos', 2, 'MySQL y PostgreSQL', 2, 'Tiempo completo', 'Bogotá', 2500000, '2025-02-20'),
(6, 2002, 'Desarrollador Frontend', 'Desarrollo UI', 3, 'HTML, CSS, JS y React', 1, 'Tiempo completo', 'Medellín', 2200000, '2025-02-01'),
(7, 2002, 'Desarrollador Backend', 'APIs y servicios', 2, 'NodeJS y PHP', 2, 'Tiempo completo', 'Medellín', 2300000, '2025-02-05'),
(8, 2002, 'QA Tester', 'Pruebas funcionales', 1, 'Experiencia en QA manual', 1, 'Tiempo parcial', 'Medellín', 1800000, '2025-02-10'),
(9, 2002, 'Project Manager', 'Gestión de proyectos', 1, 'Experiencia liderando equipos', 3, 'Tiempo completo', 'Medellín', 3100000, '2025-02-15'),
(10, 2002, 'DevOps', 'Automatización CI/CD', 2, 'Conocimiento en Jenkins y Docker', 2, 'Tiempo completo', 'Medellín', 2800000, '2025-02-20'),
(11, 2003, 'Programador Python', 'Backend', 3, 'Python y Django', 2, 'Tiempo completo', 'Cali', 2400000, '2025-02-01'),
(12, 2003, 'Administrador de Sistemas', 'Soporte TI', 2, 'Linux y Windows Server', 2, 'Tiempo completo', 'Cali', 2000000, '2025-02-05'),
(13, 2003, 'Analista de Datos', 'Data Analytics', 1, 'SQL y Excel avanzado', 1, 'Tiempo completo', 'Cali', 2500000, '2025-02-10'),
(14, 2003, 'Líder Técnico', 'Gestión de equipo', 1, 'Experiencia liderando desarrolladores', 3, 'Tiempo completo', 'Cali', 3200000, '2025-02-15'),
(15, 2003, 'QA Automatización', 'Testing automatizado', 2, 'Selenium y Jenkins', 2, 'Tiempo completo', 'Cali', 2100000, '2025-02-20'),
(16, 2004, 'Diseñador UX', 'Interfaces', 3, 'Figma y Adobe XD', 1, 'Tiempo completo', 'Barranquilla', 2000000, '2025-02-01'),
(17, 2004, 'Desarrollador Frontend', 'JS y React', 2, 'HTML, CSS, JS y React', 2, 'Tiempo completo', 'Barranquilla', 2200000, '2025-02-05'),
(18, 2004, 'Community Manager', 'Redes sociales', 1, 'Estrategias de marketing digital', 1, 'Tiempo parcial', 'Barranquilla', 1800000, '2025-02-10'),
(19, 2004, 'Product Designer', 'Diseño de productos', 1, 'UX Research y Prototipos', 3, 'Tiempo completo', 'Barranquilla', 2500000, '2025-02-15'),
(20, 2004, 'UX Researcher', 'Investigación de usuario', 2, 'Entrevistas y pruebas de usabilidad', 2, 'Tiempo completo', 'Barranquilla', 2300000, '2025-02-20'),
(21, 2005, 'Arquitecto Cloud', 'Cloud Solutions', 3, 'AWS, Azure y GCP', 3, 'Tiempo completo', 'Cartagena', 3000000, '2025-02-01'),
(22, 2005, 'DevOps', 'Automatización CI/CD', 2, 'Docker, Kubernetes, Jenkins', 2, 'Tiempo completo', 'Cartagena', 2800000, '2025-02-05'),
(23, 2005, 'Ingeniero de Datos', 'Big Data', 1, 'Hadoop y Spark', 2, 'Tiempo completo', 'Cartagena', 3200000, '2025-02-10'),
(24, 2005, 'Administrador BD', 'Manejo de bases de datos', 1, 'MySQL, PostgreSQL', 2, 'Tiempo completo', 'Cartagena', 2500000, '2025-02-15'),
(25, 2005, 'Full Stack Developer', 'Frontend & Backend', 2, 'NodeJS, React y MongoDB', 2, 'Tiempo completo', 'Cartagena', 2700000, '2025-02-20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `educacion`
--
ALTER TABLE `educacion`
  ADD PRIMARY KEY (`id_estudio`),
  ADD KEY `educ_pers_fk` (`nro_doc_persona`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`id_experiencia`),
  ADD KEY `exper_pers_fk` (`nro_doc_persona`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`nro_documento`);

--
-- Indices de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indices de la tabla `postulacion`
--
ALTER TABLE `postulacion`
  ADD PRIMARY KEY (`pers_id`,`vac_id`),
  ADD KEY `post_vac_fk` (`vac_id`);

--
-- Indices de la tabla `vacante`
--
ALTER TABLE `vacante`
  ADD PRIMARY KEY (`vacant_id`),
  ADD KEY `vac_empr_fk` (`empr_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `educacion`
--
ALTER TABLE `educacion`
  MODIFY `id_estudio` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  MODIFY `id_experiencia` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `vacante`
--
ALTER TABLE `vacante`
  MODIFY `vacant_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `educacion`
--
ALTER TABLE `educacion`
  ADD CONSTRAINT `educ_pers_fk` FOREIGN KEY (`nro_doc_persona`) REFERENCES `persona` (`nro_documento`);

--
-- Filtros para la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD CONSTRAINT `exper_pers_fk` FOREIGN KEY (`nro_doc_persona`) REFERENCES `persona` (`nro_documento`);

--
-- Filtros para la tabla `postulacion`
--
ALTER TABLE `postulacion`
  ADD CONSTRAINT `post_pers_fk` FOREIGN KEY (`pers_id`) REFERENCES `persona` (`nro_documento`),
  ADD CONSTRAINT `post_vac_fk` FOREIGN KEY (`vac_id`) REFERENCES `vacante` (`vacant_id`);

--
-- Filtros para la tabla `vacante`
--
ALTER TABLE `vacante`
  ADD CONSTRAINT `vac_empr_fk` FOREIGN KEY (`empr_id`) REFERENCES `empresa` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
