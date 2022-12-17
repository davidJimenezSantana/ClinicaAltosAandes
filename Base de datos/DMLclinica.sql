-- -----------------------------------------------------
-- Poblar tabla especialidad
-- -----------------------------------------------------
INSERT INTO
    `especialidad` (`idespecialidad`, `nombre`)
VALUES
    (NULL, 'No Aplica'),
    (NULL, 'Alergología'),
    (NULL, 'Anestesiología'),
    (NULL, 'Angiología'),
    (NULL, 'Cardiología'),
    (NULL, 'Endocrinología'),
    (NULL, 'Estomatología'),
    (NULL, 'Farmacología Clínica'),
    (NULL, 'Gastroenterología'),
    (NULL, 'Genética'),
    (NULL, 'Geriatría'),
    (NULL, 'Hematología'),
    (NULL, 'Hepatología'),
    (NULL, 'Infectología'),
    (NULL, 'Medicina aeroespacial'),
    (NULL, 'Medicina del deporte'),
    (NULL, 'Medicina familiar y comunitaria'),
    (NULL, 'Medicina física y rehabilitación'),
    (NULL, 'Medicina forense'),
    (NULL, 'Medicina intensiva'),
    (NULL, 'Medicina interna'),
    (NULL, 'Medicina preventiva y salud pública'),
    (NULL, 'Medicina del trabajo'),
    (NULL, 'Nefrología'),
    (NULL, 'Neumología'),
    (NULL, 'Neurología'),
    (NULL, 'Nutriología'),
    (NULL, 'Oncología médica'),
    (NULL, 'Oncología radioterápica'),
    (NULL, 'Pediatría'),
    (NULL, 'Psiquiatría'),
    (NULL, 'Reumatología'),
    (NULL, 'Toxicología');

-- -----------------------------------------------------
-- Poblar tabla rol
-- -----------------------------------------------------
INSERT INTO
    `rol` (`idrol`, `nombre`)
VALUES
    (NULL, 'Administador'),
    (NULL, 'Medico');

-- -----------------------------------------------------
-- Poblar tabla genero
-- -----------------------------------------------------
INSERT INTO
    `genero` (`idgenero`, `nombre`)
VALUES
    (NULL, 'Masculino'),
    (NULL, 'Femenino');

-- -----------------------------------------------------
-- Poblar tabla estado_usuario
-- -----------------------------------------------------
INSERT INTO
    `estado_usuario` (`idestado_usuario`, `nombre`)
VALUES
    (NULL, 'Contratado'),
    (NULL, 'Sin contrato'),
    (NULL, 'Activo'),
    (NULL, 'Inactivo');

-- -----------------------------------------------------
-- Poblar tabla usuario
-- -----------------------------------------------------
INSERT INTO
    `usuario` (
        `idusuario`,
        `nombre`,
        `apellido`,
        `correo`,
        `clave`,
        `rol_idrol`,
        `especialidad_idespecialidad`,
        `telefono`,
        `estado_usuario_idestado_usuario`        
    )
VALUES
    (
        NULL,
        'David Alejandro',
        'Jimenez Santana',
        'davidjimenez199701@gmail.com',
        MD5('daj'),
        '1',
        '1',
        '30213031080',
        '3'
    );

INSERT INTO
    `usuario` (
        `nombre`,
        `apellido`,
        `correo`,
        `clave`,
        `rol_idrol`,
        `especialidad_idespecialidad`,
        `telefono`,
        `estado_usuario_idestado_usuario`  
    )
VALUES
    (
        'Laura Johanna',
        'Henández Cáceres',
        'LauJoa@correo.com',
        MD5('prueba'),
        '2',
        '7',
        '320120120',
        '3'
    );

INSERT INTO
    `usuario` (
        `nombre`,
        `apellido`,
        `correo`,
        `clave`,
        `rol_idrol`,
        `especialidad_idespecialidad`,
        `telefono`,
        `estado_usuario_idestado_usuario`  
    )
VALUES
    (
        'Gabriel',
        'Garcia Marquez',
        'gabo@correo.com',
        MD5('prueba'),
        '2',
        '10',
        '365421879',
        '3'
    );

INSERT INTO
    `usuario` (
        `nombre`,
        `apellido`,
        `correo`,
        `clave`,
        `rol_idrol`,
        `especialidad_idespecialidad`,
        `telefono`,
        `estado_usuario_idestado_usuario`  
    )
VALUES
    (
        'Pedro Juan',
        'Paramo Rulfo',
        'pedroparamo@correo.com',
        MD5('prueba'),
        '2',
        '5',
        '3258741169',
        '3'
    );

INSERT INTO
    `usuario` (
        `nombre`,
        `apellido`,
        `correo`,
        `clave`,
        `rol_idrol`,
        `especialidad_idespecialidad`,
        `telefono`,
        `estado_usuario_idestado_usuario`  
    )
VALUES
    (
        'Miguel Angel',
        'Asturias',
        'miguelangel@correo.com',
        MD5('prueba'),
        '2',
        '8',
        '365214789',
        '3'
    );

INSERT INTO
    `usuario` (
        `nombre`,
        `apellido`,
        `correo`,
        `clave`,
        `rol_idrol`,
        `especialidad_idespecialidad`,
        `telefono`,
        `estado_usuario_idestado_usuario`  
    )
VALUES
    (
        'Guillermo ',
        'Cabrera Infante',
        'guillecabrera@correo.com',
        MD5('prueba'),
        '2',
        '9',
        '398745621',
        '3'
    );

-- -----------------------------------------------------
-- Poblar tabla paciente
-- -----------------------------------------------------
INSERT INTO
    `paciente` (
        `idpaciente`,
        `nombre`,
        `apellido`,
        `documento_identidad`,
        `seguro`,
        `telefono`,
        `correo`,
        `direccion`,
        `genero_idgenero`,
        `fecha_nacimiento`
    )
VALUES
    (
        NULL,
        'Emilia Isobel',
        'Euphemia Rose Clarke',
        '6325417',
        'ALLIANZ SEGUROS S.A',
        '302145785',
        'EmiliaEuphemia@correo.com',
        'cale123 #123',
        '2',
        ''
    );

INSERT INTO
    `paciente` (
        `idpaciente`,
        `nombre`,
        `apellido`,
        `documento_identidad`,
        `seguro`,
        `telefono`,
        `correo`,
        `direccion`,
        `genero_idgenero`,
        `fecha_nacimiento`
    )
VALUES
    (
        NULL,
        'Gwendoline Tracey',
        'Philippa Christie',
        '97452',
        'ASEGURADORA SOLIDARIA DE COLOMBIA',
        '8978949',
        'GwendolineTracey@correo.com',
        'calle657 # 98 12',
        '2',
        ''
    ),
    (
        NULL,
        'Christopher',
        'Catesby Harington',
        '874864',
        'AXA COLPATRIA SEGUROS S.A',
        '658468541',
        'ChristopherCatesby@correo.com',
        'carrera 56 # 56 43',
        '1',
        ''
    ),
    (
        NULL,
        'Joseph Jason',
        'Namakaeha Momoa',
        '897941641',
        'BBVA SEGUROS COLOMBIA S.A',
        '6545163',
        'JosephNamakaeha@correo.com',
        'diag 53 @ 54 56',
        '1',
        ''
    ),
    (
        NULL,
        'Peter ',
        'Hayden Dinklage',
        '684136541',
        'BERKLEY INTERNATIONAL SEGUROS COLOMBIA S.A.',
        '5464841',
        'PeterHayden@correo.com',
        'calle54 # 56 09',
        '1',
        ''
    ),
    (
        NULL,
        'William Isaac',
        'Hempstead Wright',
        '5645465',
        'BMI COMPAÑIA DE SEGUROS',
        '654646',
        'WilliamIsaac@correo.com',
        'cra 54 # 98 14',
        '1',
        ''
    );

-- -----------------------------------------------------
-- Poblar tabla historia clinica
-- -----------------------------------------------------
INSERT INTO
    `historia_clinica` (
        `idhistoria_clinica`,
        `paciente_idpaciente`,
        `Tratamiento`
    )
VALUES
    (
        '1',
        '1',
        'Asistencia mecánica para la insuficiencia cardíaca. Mantenimiento de una adecuada presión arterial, gracias a la asistencia ventricular, para correcta perfusión de los órganos vitales, posibilitando su funcionamiento y evitando el fracaso multiorgánico.'
    ),
    (
        '2',
        '2',
        'Artroscopia de rodilla. Reparación y trato de problemas del cartílago y lesiones meniscales por Lesion de menisco'
    ),
    (
        '3',
        '3',
        'Apendicectomía. inflamación o infección del apéndice, circunstancia que hace precisa su extirpación con el fin de evitar que la infección se disemine por el espacio abdominal y provoque una peritonitis.'
    ),
    (
        '4',
        '4',
        'Aerosolterapia o el uso de inhaladores por asma bronquial, Fibrosis pulmonar, infecciones de vías respiratorias altas.'
    ),
    (
        '5',
        '5',
        'Adenoidectomía. inflamación de las vegetaciones grande, tapona el paso de aire desde la fosa nasal hasta la laringe, se realiza una respiración oral como mecanismo de compensación.'
    ),
    (
        '6',
        '6',
        'Prostatectomía intervención quirúrgica para extraer parte de la glándula prostática. por hiperplasia benigna de próstata. '
    );

-- -----------------------------------------------------
-- Poblar tabla agenda
-- -----------------------------------------------------
INSERT INTO
    `agenda` (`idagenda`, `usuario_idusuario`)
VALUES
    (NULL, '1'),
    (NULL, '2'),
    (NULL, '3'),
    (NULL, '4'),
    (NULL, '5'),
    (NULL, '6');

-- -----------------------------------------------------
-- Poblar tabla estado_visita
-- -----------------------------------------------------
INSERT INTO
    `estado_visita` (`idestado_visita`, `nombre`)
VALUES
    (NULL, 'Pendiente'),
    (NULL, 'Culminada'),
    (NULL, 'Cancelada');

-- -----------------------------------------------------
-- Poblar tabla visita
-- -----------------------------------------------------
INSERT INTO
    `visita` (
        `idvisita`,
        `estado_visita_idestado_visita`,
        `agenda_idagenda`,
        `fecha`,
        `hora`,
        `observaciones`,
        `motivo`,
        `historia_clinica_idhistoria_clinica`
    )
VALUES
    (
        NULL,
        '3',
        '4',
        '2022-12-09',
        '11:16:38',
        'cancelada',
        'consulta procedimiento insuficiencia caridaca',
        '1'
    ),
    (
        NULL,
        '2',
        '4',
        '2022-12-30',
        '18:29:00',
        'Sin observaciones',
        'Sintomas de insuficiencia cardiaca',
        '1'
    ),
    (
        NULL,
        '1',
        '4',
        '2022-12-23',
        '08:29:00',
        'Sin observaciones',
        'consulta procedimiento insuficiencia caridaca',
        '1'
    );

INSERT INTO
    `visita` (
        `idvisita`,
        `estado_visita_idestado_visita`,
        `agenda_idagenda`,
        `fecha`,
        `hora`,
        `observaciones`,
        `motivo`,
        `historia_clinica_idhistoria_clinica`
    )
VALUES
    (
        NULL,
        '3',
        '2',
        '2022-12-12',
        '18:17:07',
        'Sin observaciones.',
        '',
        '2'
    ),
    (
        NULL,
        '1',
        '2',
        '2022-12-08',
        '20:12:07',
        'Nunguna',
        'Ninguno',
        '2'
    );

INSERT INTO
    `visita` (
        `idvisita`,
        `estado_visita_idestado_visita`,
        `agenda_idagenda`,
        `fecha`,
        `hora`,
        `observaciones`,
        `motivo`,
        `historia_clinica_idhistoria_clinica`
    )
VALUES
    (
        NULL,
        '2',
        '3',
        '2022-12-02',
        '08:20:00',
        'Sin observaciones',
        'no hay',
        '3'
    ),
    (
        NULL,
        '1',
        '3',
        '2022-12-23',
        '21:21:00',
        'sin observaciones',
        'sin motivo',
        '3'
    );

INSERT INTO
    `visita` (
        `idvisita`,
        `estado_visita_idestado_visita`,
        `agenda_idagenda`,
        `fecha`,
        `hora`,
        `observaciones`,
        `motivo`,
        `historia_clinica_idhistoria_clinica`
    )
VALUES
    (
        NULL,
        '3',
        '5',
        '2022-12-10',
        '11:21:17',
        'No hay',
        'sin motivo',
        '4'
    ),
    (
        NULL,
        '2',
        '5',
        '2022-12-02',
        '10:20:31',
        'No hay observaciones',
        'No hay motivo',
        '4'
    );

INSERT INTO
    `visita` (
        `idvisita`,
        `estado_visita_idestado_visita`,
        `agenda_idagenda`,
        `fecha`,
        `hora`,
        `observaciones`,
        `motivo`,
        `historia_clinica_idhistoria_clinica`
    )
VALUES
    (
        NULL,
        '1',
        '6',
        '2022-12-16',
        '15:25:17',
        'sin observaciones',
        'Sin motivo',
        '6'
    ),
    (
        NULL,
        '1',
        '7',
        '2022-12-10',
        '14:00:00',
        'no hay',
        'no hay',
        '6'
    );